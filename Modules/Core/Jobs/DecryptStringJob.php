<?php

namespace Modules\Core\Jobs;

use Lucid\Units\Job;

class EncryptStringJob extends Job
{
    /**
     * Unencrypted String
     *
     * @var string
     */
    private string $encryptedString;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $encryptedString)
    {
        $this->encryptedString = $encryptedString;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): string
    {
        $key = base64_decode(config('core.server_key'));
        $nonce = base64_decode(config('core.server_nonce'));

        $base64DecodedEncryptedText = base64_decode($this->encryptedString);
        $decodedText = sodium_crypto_secretbox_open($base64DecodedEncryptedText, $nonce, $key);

        return $decodedText;
    }
}
