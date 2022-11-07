<?php

namespace Modules\Core\Jobs;

use Illuminate\Support\Facades\Redirect;
use Lucid\Units\Job;

class RedirectBackWithMessageSuccess extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(

        /**
         * User Id
         *
         * @var string
         */
        public string $message

    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        return redirect()->back()->with('successMessage', $this->message);
    }
}
