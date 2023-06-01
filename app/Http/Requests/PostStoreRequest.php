<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'level' => 'required|in:blog,sermon,event',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'title' => 'required',
            'slug'  => 'required|unique:posts,slug',
            'statusx' => 'required|in:DRAFT,PUBLISHED',
            'tags' => 'required|array',
            'excerpt' => 'required',
            'img'   => 'required|image|mimes:jpeg,png,jpg|max:5048',
            

            /*
            'cities_id' => 'required|integer',
            'direccion' => 'required',
            'date_activi' => 'required',
            'last_activity' => 'required',
            'activity' => 'required|in:ON,OFF',
            */
            
            

        ];

        if ($this->get('in:event')) {
            $rules = array_merge($rules, [
                'cities_id' => 'required|integer',
                'direccion' => 'required',
                'date_activi' => 'required',
                'last_activity' => 'required',
                'activity' => 'required|in:ON,OFF',
            ]);
        }

        
        if ($this->get('content')) {
            $rules = array_merge($rules, ['content' => 'required']);
        }

        if ($this->get('author_id')) {
            $rules = array_merge($rules, ['author_id' => 'integer']);
        }

        if ($this->get('sponsor_id')) {
            $rules = array_merge($rules, ['sponsor_id' => 'integer']);
        }

        if ($this->get('url_video')) {
            $rules = array_merge($rules, ['url_video' => 'required']);
        }

        return $rules;
    }
}
