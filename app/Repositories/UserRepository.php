<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function index()
    {
        try {
            $users = User::all();

            return $users;
        } catch (\Exception $e) {
            Log::error("Error in get users", [$e->getMessage(), $e->getCode()]);
        }

        return false;
    }
    public function store(array $data)
    {
        try {
            $user = User::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => Hash::make($data["password"]),
                "permissions" => $data["permissions"]
            ]);

            return $user;
        } catch (\Exception $e) {
            Log::error("Error in show User by email", [$e->getMessage(), $e->getCode()]);
        }

        return false;
    }

    public function findOrFailByEmail(array $data)
    {
        try {
            $user = User::where("email", $data["email"])->get();

            return $user->first();
        } catch (\Exception $e) {
            Log::error("Error in show User by email", [$e->getMessage(), $e->getCode()]);
        }

        return false;
    }
}
