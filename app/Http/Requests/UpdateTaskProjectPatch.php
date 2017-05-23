<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskProjectPatch extends FormRequest
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
        return [
          'user_id' => 'required | integer',
          'name' => 'required_without: description, state, role_id, user_id | string',
          'description' => 'required_without: name, state, role_id, user_id | string',
          'state' => 'required_without: name, description, role_id, user_id | string',
          'role_id' => 'required_without: user_id, name, description, state | integer'
        ];
    }
}
