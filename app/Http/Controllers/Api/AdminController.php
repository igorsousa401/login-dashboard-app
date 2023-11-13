<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Services\AuthService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public $userService;
    public $authService;

    public function __construct(
        UserService $userService,
        AuthService $authService
    )
    {
        $this->userService = $userService;
        $this->authService = $authService;
    }

    public function storeUser(UserStoreRequest $request)
    {
        try {
            $user = $this->userService->storeCommon($request->all());

            if($user["success"]) {
                $request->session()->regenerate();
                return redirect()->route("app.admin.users");
            }

        } catch (\Exception $e) {
            Log::error("Error in add user Api", [$e->getCode(), $e->getMessage()]);
        }

        return redirect()->back()->withErrors(["message" => "Erro ao tentar adicionar usuário, tente novamente mais tarde."]);
    }

    public function updateUser(string $id, UserUpdateRequest $request)
    {
        try {
            $user = $this->userService->update($id, $request->all());

            if($user["success"]) {
                $request->session()->regenerate();
                return redirect()->route("app.admin.users");
            }

        } catch (\Exception $e) {
            Log::error("Error in update user Api", [$e->getCode(), $e->getMessage()]);
        }

        return redirect()->back()->withErrors(["message" => "Erro ao tentar editar usuário, tente novamente mais tarde."]);
    }

    public function deleteUser(string $id)
    {
        try {
            $userDelete = $this->userService->delete($id);

            if($userDelete["success"]) {
                return redirect()->route("app.admin.users");
            }

        } catch (\Exception $e) {
            Log::error("Error in delete user Api", [$e->getCode(), $e->getMessage()]);
        }

        return redirect()->back()->withErrors(["message" => "Erro ao tentar deletar usuário, tente novamente mais tarde."]);
    }
}
