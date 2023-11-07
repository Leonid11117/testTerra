<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 * @property string $password
 */
final class RegisterRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
        ];
    }
}
