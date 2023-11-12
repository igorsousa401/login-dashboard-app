<?php

namespace App\Services;

use App\Repositories\UserRepository;
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

    public function index()
    {
        try {
            $users = $this->userRepository->index();

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

    }
}
