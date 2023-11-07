<?php

namespace App\Http\Controllers\Product;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

final class DeleteController extends Controller
{
    /**
     * @param int $id
     *
     * @return JsonResponse
     */
    public function __invoke(int $id): JsonResponse
    {
        $user = auth()->user();

        $product = Product::query()
            ->where('id', '=', $id)
            ->where('user_id', '=', $user->id)
            ->firstOrFail();

        $product->delete();

        return response()->json([], ResponseAlias::HTTP_NO_CONTENT);
    }
}
