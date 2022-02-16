<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Get all the users
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    /**
     * User registration page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('register');
    }

    /**
     * User store
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RegisterRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('user.store.success');
    }

    /**
     * User create success page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function success()
    {
        return view('success');
    }

    /**
     * Delete Frankfurt users
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFrankfurtUsers()
    {
        DB::statement("Delete from users where city='Frankfurt' and description is null");

        return redirect()->route('user.group');
    }
}
