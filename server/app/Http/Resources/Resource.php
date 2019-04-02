<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource as BaseResource;

class Resource extends BaseResource
{
    protected function getAttribute($name)
    {
        if (!property_exists($this->resource, $name)) {
            return null;
        }

        return $this->{$name};
    }
}
