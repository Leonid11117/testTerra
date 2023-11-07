<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Product\ViewProductResource;

final class UpdateController extends Controller
{
    /**
     * @param int $id
     * @param ProductRequest $request
     *
     * @return JsonResource
     * @throws \Throwable
     */
    public function __invoke(int $id, ProductRequest $request): JsonResource
    {
        $user = \auth()->user();

        $product = Product::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', $user->id)
            ->firstOrFail();

        $product->fill([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        $product->saveOrFail();

        return ViewProductResource::make($product);
    }
}
