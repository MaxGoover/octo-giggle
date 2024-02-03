<?php

namespace App\Adapters\Http\Actions\Worker\Index;

use Illuminate\Foundation\Http\FormRequest;

class WorkerIndexRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'descending' => [
                'required',
                'boolean',
            ],
            'page' => [
                'required',
                'integer',
            ],
            'rowsNumber' => [
                'required',
                'integer',
            ],
            'rowsPerPage' => [
                'required',
                'integer',
            ],
            'search' => [
                'required',
                'string',
            ],
            'sortBy' => [
                'required',
                'array',
            ],
        ];
    }
}
