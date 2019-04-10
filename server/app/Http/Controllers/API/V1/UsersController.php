<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\UserResource;
use App\Repositories\HackerNews\UserRepositoryInterface;

class UsersController extends Controller
{
    private $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function show(string $username)
    {
        $user = $this->repository->find($username);

        if (!$user) {
            return response()->json(null, 404);
        }

        return new UserResource($user);
    }
}
