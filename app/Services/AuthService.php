<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public $userRepository;
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $data)
    {
        try {
            $user = $this->userRepository->findOrFailByEmail($data);

            if($user) {
                if(Hash::check($data["password"], $user->password)) {
                    $dataLogin = [
                        "email" => $data["email"],
                        "password" => $data["password"],
                    ];
                    if (Auth::attempt($dataLogin)) {
                        $dataSuccess = [
                            "success" => true
                        ];
                        return $dataSuccess;
                    }
                }
            }
        } catch (\Exception $e) {
            Log::error("Error in login Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }

    public function registerAdmin(array $data)
    {
        try {
            $data["type"] = "admin";
            $data["permissions"] = array("all");

            $register = $this->userRepository->store($data);

            if($register) {
                $dataLogin = [
                    "email" => $data["email"],
                    "password" => $data["password"]
                ];

                if (Auth::attempt($dataLogin)) {
                    $dataSuccess = [
                        "success" => true
                    ];
                    return $dataSuccess;
                }
            }
        } catch (\Exception $e) {
            Log::error("Error in login Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }

    public function logout()
    {
        try {
            if(Auth::logout()) {
                $dataSuccess = [
                    "success" => true
                ];
                return $dataSuccess;
            }
        } catch (\Exception $e) {
            Log::error("Error in logout Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }
}
