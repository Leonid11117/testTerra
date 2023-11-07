<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $name
 * @property string $description
 */
final class ProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:65535'],
        ];
    }
}
