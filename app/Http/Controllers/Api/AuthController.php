<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\FormLoginRequest;
use App\Http\Requests\Register\FormRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;

class AuthController extends Controller
{
    public $authService;

    public function __construct(
        AuthService $authService
    )
    {
        $this->authService = $authService;
    }

    public function login(FormLoginRequest $request)
    {
        try {
            $login = $this->authService->login($request->all());

            if($login["success"]) {
                $request->session()->regenerate();

                switch (auth()->user()->type) {
                    case "admin":
                        return redirect()->route("app.admin.index");
                        break;
                    case "common":
                        return redirect()->route("app.common.index");
                        break;
                }
            }
        } catch (\Exception $e) {
            Log::error("Error in login Api", [$e->getCode(), $e->getMessage()]);
        }

        return redirect()->back()->withErrors(["message" => "Erro ao tentar realizar o login, tente novamente mais tarde."]);
    }

    public function registerAdmin(FormRegisterRequest $request)
    {
        try {
            $register = $this->authService->registerAdmin($request->all());

            if($register["success"]) {
                $request->session()->regenerate();

                return redirect()->route("app.admin.index");
            }

        } catch (\Exception $e) {
            Log::error("Error in login Api", [$e->getCode(), $e->getMessage()]);
        }

        return redirect()->back()->withErrors(["message" => "Erro ao tentar realizar o login, tente novamente mais tarde."]);
    }

    public function logout(Request $request) {
        try {
            $logout = $this->authService->logout();

            if($logout["success"]) {
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return redirect()->route("auth.login.get");
            }

        } catch (\Exception $e) {
            Log::error("Error in logout Api", [$e->getCode(), $e->getMessage()]);
        }

        return redirect()->back()->withErrors(["message" => "Erro ao tentar realizar o logout, tente novamente mais tarde."]);
    }
}
