<?php

namespace Modules\Core\Features;

use Lucid\Units\Feature;
use Illuminate\Http\Request;
use Modules\Core\Jobs\RedirectBackWithMessageSuccess;
use Modules\Core\Jobs\UpdateUserRequestJob;
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
        //Set the ID to the request to validate
        $request->request->set('id', $this->id);

        //Run the validation
        $validatedData = $this->run(new ValidateUserRequestJob($request));

        //Updated the user
        $this->run(new UpdateUserRequestJob($validatedData, $this->id));

        //Return with success messageBag
        return $this->run(new RedirectBackWithMessageSuccess('Profile updated successfully.'));
    }
}
