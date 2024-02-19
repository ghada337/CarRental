<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::when($request->Search, function ($query, $search) {
            $query->where("username", "LIKE", "%{$search}%")
                ->orWhere("email", "LIKE", "%{$search}%");
        })->get();

        return view("admin.users.users", compact("users"));
    }

    public function create()
    {
        return view("admin.users.addUser");
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data["password"] = Hash::make($data['password']);
        $data["Active"] = $request->has("Active");
        $user = User::create($data);
        return back();
    }

    public function edit(User $user)
    {
        return view("admin.users.editUser", compact("user"));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        if (!empty($data['password']) && $data['password'] != $user->password) {
            $data["password"] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data["Active"] = $request->has("Active");
        $user->update($data);
        return redirect()->route('admin.users.index');
    }
}
