<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'role' => ['required'],
            'password' => $this->passwordRules(),
        ])->validate();
        return User::create([
            'first_name' => $input['first_name'],
            'name' => $input['name'],
            'user_name' => $input['user_name'],
            'email' => $input['email'],
            'id_role' => 2,
            'password' => Hash::make($input['password'])
        ]);
    }
}
