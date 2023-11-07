<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Request;
use App\DTO\Auth\RegisteredUser;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User\ViewUserResource;

/**
 * @property-read RegisteredUser $resource
 */
final class ViewAuthResource extends JsonResource
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'token' => $this->resource->getToken(),
            'user' => ViewUserResource::make($this->resource->getUser()),
        ];
    }
}
