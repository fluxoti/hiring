<?php

namespace App\Http\Controllers;

use App\Repositories\StoryRepository;
use App\Http\Resources\StoryResource;
use App\Http\Resources\StoryCollection;

class StoriesController extends Controller
{
    public function __construct(StoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return new StoryCollection($this->repository->all());
    }

    public function show($id)
    {
        return new StoryResource($this->repository->find($id));
    }
}
