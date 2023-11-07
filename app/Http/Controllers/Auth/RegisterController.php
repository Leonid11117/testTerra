<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\DTO\Auth\RegisteredUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Auth\ViewAuthResource;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Resources\Json\JsonResource;

final class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     *
     * @return JsonResource
     *
     * @throws \Throwable
     */
    public function __invoke(RegisterRequest $request): JsonResource
    {
        $user = new User();

        $user->fill([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->saveOrFail();

        $token = $user->createToken(User::TOKEN_NAME);

        return ViewAuthResource::make(
            new RegisteredUser(
                $token->plainTextToken,
                $user,
            )
        );
    }
}
