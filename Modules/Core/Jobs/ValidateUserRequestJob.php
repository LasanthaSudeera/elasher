<?php

namespace Modules\Core\Jobs;

use Illuminate\Http\Request;
use Lucid\Units\Job;
use Modules\Core\Http\Requests\UserRequest;

class ValidateUserRequestJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        /**
         * Request from the user update request
         *
         * @var Request
         */
        private Request $request
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserRequest $userRequest)
    {
        return $userRequest->validated();
    }
}
