<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Resources\ItemResource;
use App\Repositories\HackerNews\ItemRepositoryInterface;

class ItemsController extends Controller
{
    private $repository;

    public function __construct(ItemRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index($type)
    {
        return response()->json($this->repository->storiesByType($type));
    }

    public function show(int $id)
    {
        return new ItemResource($this->repository->find($id));
    }

    public function lastId()
    {
        return $this->repository->lastId();
    }
}
