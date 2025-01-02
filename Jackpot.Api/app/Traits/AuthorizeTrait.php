<?php

namespace App\Traits;

use Illuminate\Support\Facades\Gate;

trait AuthorizeTrait
{
    public function isOwner($user_id)
    {
        return Gate::allows('owner', $user_id);
    }
}
