<?php

namespace Modules\Core\Jobs;

use Lucid\Units\Job;

class DecryptStringJob extends Job
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
        //
    }
}
