<?php

namespace Modules\Core\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Modules\Core\Jobs\ValidateUserRequestJob;

class UpdateUserFeature extends Feature
{
    public function __construct(
        /**
         * Id of the User to update
         *
         * @var string
         */
        private string $id
    ) {
    }

    public function handle(Request $request)
    {
        $request->request->set('id', $this->id);
        $validatedData = $this->run(ValidateUserRequestJob::class, ['request' => $request]);
        dd($validatedData);
    }
}
