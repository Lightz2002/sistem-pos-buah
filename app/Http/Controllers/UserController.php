<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    //
    //
    /**
     * Display the users list.
     */
    public function index(Request $request): View
    {
        return view('user.list-user');
    }

    public function create(Request $request): View
    {
        return view('user.create-user', [
            'roles' => Role::all()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

        event(new Registered($user));

        session()->flash('message', 'User Added Successfully');

        return redirect()->route('users');
    }

    public function edit(User $user): View
    {
        return view('user.edit-user', [
            'roles' => Role::all(),
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore(request()->route('user')->id)],
            'role' => ['required', 'int'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_no = $request->phone_no;
        $user->address = $request->address;

        $user->assignRole($request->role);

        $user->save();

        session()->flash('message', 'User Updated Successfully');

        return redirect()->route('users');
    }

    public function destroy(Request $request, User $user): JsonResponse
    {
        $user->delete();


        return response()->json(['message' => 'User Deleted Successfully']);
    }
}
