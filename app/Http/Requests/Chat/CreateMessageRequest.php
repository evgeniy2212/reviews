<?php

namespace App\Http\Requests\Chat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CreateMessageRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'photo'  => [
                'sometimes',
                'file',
                'mimes:png,jpg,jpeg',
            ],
            'message'   => [
                'sometimes',
                'string',
            ],
            'chat_id' => [
                'required',
                Rule::exists('chats', 'id')
            ]
        ];
    }
}
