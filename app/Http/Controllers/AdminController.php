<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $userService;

    public function __construct(
        UserService $userService
    )
    {
        $this->userService = $userService;
    }

    public function index()
    {
        return view("app.admin.index");
    }

    public function users()
    {
        $users = $this->userService->getUsersCommon();
        $users = $users["data"];
        return view("app.admin.users", compact("users"));
    }

    public function addUser()
    {
        return view("app.admin.add-user");
    }

    public function updateUser(string $id)
    {
        $user = $this->userService->show($id);
        if(!$user["success"]) {
            abort(403, "O usuário não existe");
        }
        $user = $user["data"];
        return view("app.admin.update-user", compact("user"));
    }

}
