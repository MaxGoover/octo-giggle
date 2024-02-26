<?php

declare(strict_types=1);

namespace App\Adapters\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class UploadProductsRequest extends FormRequest
{
    /**
     * Сообщения об ошибках.
     */
    public function messages()
    {
        return [
            'file.required' => 'Не указан файл для загрузки',
            'file.mimes' => 'Загружаемый файл должен быть формата csv'
        ];
    }

    /**
     * Правила валидации.
     */
    public function rules(): array
    {
        return [
            'file' => [
                'required',
                'mimes:csv,txt',
            ],
        ];
    }
}
