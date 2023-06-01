<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        
        $rules = [
            
            'name' => 'required',
            'slug'  => 'required|unique:authors,slug' . $this->author,
            'content' => 'required',
            'statusx' => 'required|in:DRAFT,PUBLISHED',
            
            //'img'   => 'required|image|mimes:jpeg,png,jpg|max:5048',

        ];

        if ($this->get('img')) {
              $rules = array_merge($rules, ['img' => 'mimes:jpeg,png,jpg|max:5048']);
        }

        return $rules;


    }
}
