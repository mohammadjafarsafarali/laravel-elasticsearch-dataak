<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'date' => 'array|max:2',
            'date.*.operand' => 'required_with:date.*.value|in:gt,gte,lt,lte',
            'date.*.value' => 'required_with:date.*.operand|date_format:Y-m-d H:i:s',
            'params' => 'array',
            'params.*' => 'string|in:article_title,source_name,user_name,instagram_id,twitter_id',
            'operation' => 'required|in:and,or'
        ];
    }
}
