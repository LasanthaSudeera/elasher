<?php

namespace Modules\Core\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class GenerateEncryptionKeys extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'generate:security-keys';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will generate the KEY and NONCE for IP and Port encryption.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        if ($this->confirm('You are about to generate a security key, if you override or lose this key, your servers data will be inaccessible. Are you sure?')) {

            $keyPairs = [
                'SERVER_KEY' => null,
                'SERVER_NONCE' => null
            ];

            $key = base64_encode(random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES));
            $nonce = base64_encode(random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES));

            $keyPairs['SERVER_KEY'] = $key;
            $keyPairs['SERVER_NONCE'] = $nonce;

            $this->saveArrayToEnv($keyPairs);

            $this->info('The keys was generated successfully!');
        }


        return 0;
    }

    /**
     * Set .env key-value pair
     *
     * @param array $keyPairs Desired key name
     * @return void
     */
    private function saveArrayToEnv(array $keyPairs)
    {
        $envFile = app()->environmentFilePath();
        $newEnv = file_get_contents($envFile);

        $newlyInserted = false;

        foreach ($keyPairs as $key => $value) {
            // Make sure key is uppercase (can be left out)
            $key = Str::upper($key);

            if (str_contains($newEnv, "$key=")) {
                // If key exists, replace value
                $newEnv = preg_replace("/$key=(.*)\n/", "$key=$value\n", $newEnv);
            } else {
                // Check if spacing is correct
                if (!str_ends_with($newEnv, "\n\n") && !$newlyInserted) {
                    $newEnv .= str_ends_with($newEnv, "\n") ? "\n" : "\n\n";
                    $newlyInserted = true;
                }
                // Append new
                $newEnv .= "$key=$value\n";
            }
        }

        $fp = fopen($envFile, 'w');
        fwrite($fp, $newEnv);
        fclose($fp);
    }
}
