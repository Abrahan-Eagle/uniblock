<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            
            '_token' => 'required',
            'level' => 'required',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'title' => 'required',
            'slug'  => 'required|unique:posts,slug' . $this->post,
            'statusx' => 'required|in:DRAFT,PUBLISHED',
            'tags' => 'required|array',
            'excerpt' => 'required',
            'content' => 'required',
            //'img'   => 'required|image|mimes:jpeg,png,jpg|max:5048',

        ];

        if ($this->get('author_id')) {
            $rules = array_merge($rules, ['author_id' => 'integer']);
        }

        if ($this->get('sponsor_id')) {
            $rules = array_merge($rules, ['sponsor_id' => 'integer']);
        }

        if ($this->get('img')) {
              $rules = array_merge($rules, ['img' => 'mimes:jpeg,png,jpg|max:5048']);
        }

        if ($this->get('url_video')) {
            $rules = array_merge($rules, ['url_video' => 'required']);
        }

        return $rules;
    }
}
