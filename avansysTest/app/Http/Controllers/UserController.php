<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserServices();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->userService->getAllUsers();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->userService->createuser($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->userService->getUserById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return $this->userService->updateUser($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->userService->deleteUser($id);
    }
}
