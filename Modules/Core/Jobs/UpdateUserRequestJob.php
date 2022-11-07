<?php

namespace Modules\Core\Jobs;

use App\Models\User;
use Lucid\Units\Job;

class UpdateUserRequestJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        /**
         * Input array from the validation request
         *
         * @var array
         */
        public array $input,

        /**
         * User Id
         *
         * @var string
         */
        public string $userId

    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $user = User::findOrFail($this->userId);
        $user->update($this->input);
        return $user;
    }
}
