<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class SearchRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('frontend');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'query' => [
                'string',
                'nullable'
            ]
        ];
    }

    /**
     * @return array
     */
    public function validationData()
    {
        return array_merge($this->request->all(), [
            'query' => request('query'),
        ]);
    }
}
