<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function show($id_user)
    {
        return User::findOrFail($id_user);
    }
}
