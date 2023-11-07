<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\ViewProductResource;

final class CreateController extends Controller
{
    /**
     * @param ProductRequest $request
     *
     * @return JsonResource
     * @throws \Throwable
     */
    public function __invoke(ProductRequest $request): JsonResource
    {
        $user = auth()->user();

        $product = new Product();

        $product->fill([
            'name' => $request->name,
            'user_id' => $user->id,
            'description' => $request->description
        ]);

        $product->saveOrFail();

        return ViewProductResource::make($product);
    }
}
