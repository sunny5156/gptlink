<?php

namespace App\Http\Resource;

use Aimilink\HyperfExt\BaseResource;
use Hyperf\Utils\Arr;

class ModelResource extends BaseResource
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return Arr::get($this->resource, 'data', []);
    }

}
