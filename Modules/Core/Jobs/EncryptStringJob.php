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
    private string $unencryptedString;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $unencryptedString)
    {
        $this->unencryptedString = $unencryptedString;
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
