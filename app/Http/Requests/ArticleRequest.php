<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'source' => 'required|exists:sources,name',
            'user_id' => 'required|exists:users,id',
            'title' => 'sometimes|string|min:3',
            'content' => 'required|string|min:10',
            'file_url' => 'sometimes|array',
            'file_url.*' => 'url',
        ];
    }
}
