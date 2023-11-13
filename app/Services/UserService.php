<?php

namespace App\Services;

use App\Repositories\UserRepository;
use http\Params;
use Illuminate\Support\Facades\Log;

class UserService
{
    public $userRepository;
    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }

    public function getUsersCommon()
    {
        try {
            $data = [
                "type" => ["admin", "common"]
            ];

            $users = $this->userRepository->getUsersByTypes($data);

            if($users) {
                $dataSucess = [
                    "success" => true,
                    "data" => $users
                ];

                return $dataSucess;
            }
        } catch (\Exception $e) {
            Log::error("Error in get users Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }

    public function storeCommon(array $data)
    {
        try {
            $dataUser = [
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => $data["password"],
                "type" => "common",
                "permissions" => $data["permissions"]
            ];

            $user = $this->userRepository->store($dataUser);

            if($user) {
                $dataSucess = [
                    "success" => true,
                    "data" => $user
                ];

                return $dataSucess;
            }
        } catch (\Exception $e) {
            Log::error("Error in store user Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }

    public function show(string $id)
    {
        try {
            $user = $this->userRepository->findOrFailById($id);

            if($user) {
                $dataSucess = [
                    "success" => true,
                    "data" => $user
                ];

                return $dataSucess;
            }
        } catch (\Exception $e) {
            Log::error("Error in show user Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }

    public function update(string $id, array $data)
    {
        try {
            $userUpdate = $this->userRepository->update($id, $data);

            if($userUpdate) {
                $dataSucess = [
                    "success" => true,
                ];

                return $dataSucess;
            }
        } catch (\Exception $e) {
            Log::error("Error in update user Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }

    public function delete(string $id)
    {
        try {
            $userDelete = $this->userRepository->destroy($id);

            if($userDelete) {
                $dataSucess = [
                    "success" => true,
                ];

                return $dataSucess;
            }
        } catch (\Exception $e) {
            Log::error("Error in delete user Service", [$e->getCode(), $e->getMessage()]);
        }

        $dataError = [
            "success" => false
        ];

        return $dataError;
    }
}
