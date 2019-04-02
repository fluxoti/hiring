<?php

namespace App\Http\Resources;

class UserResource extends Resource
{
    public function toArray($request)
    {
        return [
            'username' => $this->id,
            'karma' => $this->karma,
            'items' => $this->submitted,
            'createdAt' => $this->created,
        ];
    }
}
