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
        $users = $this->userService->index();
        $users = $users["data"];
        return view("app.admin.users", compact("users"));
    }
}
