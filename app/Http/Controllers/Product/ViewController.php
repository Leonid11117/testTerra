<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\ViewProductResource;

final class ViewController extends Controller
{
    /**
     * @param int $id
     *
     * @return JsonResource
     */
    public function __invoke(int $id): JsonResource
    {
        $user = \auth()->user();

        $product = Product::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', $user->id)
            ->firstOrFail();

        return ViewProductResource::make($product);
    }
}
