<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\DTO\Auth\RegisteredUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\ViewAuthResource;
use Illuminate\Http\Resources\Json\JsonResource;

final class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     *
     * @return JsonResource
     */
    public function __invoke(LoginRequest $request): JsonResource
    {
        $user = User::query()->where('email', '=', $request->email)->first();
        $token = $user->createToken(User::TOKEN_NAME);

        /** @var User $user */
        return ViewAuthResource::make(
            new RegisteredUser(
                $token->plainTextToken,
                $user,
            )
        );
    }
}
