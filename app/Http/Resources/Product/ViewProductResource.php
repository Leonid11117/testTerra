<?php

namespace App\Http\Resources\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Product $resource
 */
final class ViewProductResource extends JsonResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description
        ];
    }
}
