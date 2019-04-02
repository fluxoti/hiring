<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\UserResource;
use App\Repositories\HackerNews\UserRepository;

class UsersController extends Controller
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function show(string $username)
    {
        $user = $this->repository->find($username);

        return response()->json(new UserResource($user));
    }
}
