<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $email
 * @property string $password
 */
final class LoginRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email:rfc,dns', 'exists:users,email'],
            'password' => ['required', 'string', 'max:255'],
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param \Illuminate\Validation\Validator $validator
     * @return void
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $user = User::query()->select('password')->where('email', '=', $this->email)->first();

            if (!Hash::check($this->password, $user->password)) {
                $validator->errors()->add('password', 'Password is incorrect.');
            }
        });
    }
}
