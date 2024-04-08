<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\ResponseRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    protected $userRepo;
    protected $responseRepo;
    public function __construct(UserRepositoryInterface $userRepo, ResponseRepositoryInterface $responseRepo)
    {
        $this->userRepo = $userRepo;
        $this->responseRepo = $responseRepo;
    }
    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        return $this->userRepo->list($request->role_id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();
        try {
            return $this->userRepo->store($data);
        } catch (Exception $e) {
            return $this->responseRepo->error_response($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return $this->userRepo->show($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();
        try {
            return $this->userRepo->update($data, $user);
        } catch (Exception $e) {
            return $this->responseRepo->error_response($e);
        }
    }

    /**
     * Soft delete the specified resource from storage.
     */
    public function delete(User $user)
    {
        try {
            if ($this->userRepo->delete($user)) return response()->json(["message" => "User is deleted."]);
            return response()->json(["message" => "Error deleting user, please try again."], 500);
        } catch (Exception $e) {
            return $this->responseRepo->error_response($e);
        }
    }
}
