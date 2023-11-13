<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function getUsersByTypes(array $data)
    {
        try {
            $users = User::whereIn("type", $data["type"])->get();

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
                "permissions" => $data["permissions"],
                "type" => $data["type"]
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

    public function findOrFailById(string $id)
    {
        try {
            $user = User::where("id", $id)->get();

            return $user->first();
        } catch (\Exception $e) {
            Log::error("Error in show User by Id", [$e->getMessage(), $e->getCode()]);
        }

        return false;
    }

    public function update(string $id, array $data)
    {
        try {
            $user = User::where("id", $id)->get();

            if($user->count() > 0) {
                if($user->first()->update($data)) {
                    return $user;
                }
            }
        } catch (\Exception $e) {
            Log::error("Error in Update User", [$e->getMessage(), $e->getCode()]);
        }

        return false;
    }

    public function destroy(string $id)
    {
        try {
            $user = User::where("id", $id)->get();

            if($user->count() > 0) {
                if($user->first()->delete()) {
                    return true;
                }
            }
        } catch (\Exception $e) {
            Log::error("Error in Update User", [$e->getMessage(), $e->getCode()]);
        }

        return false;
    }
}
