<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rule = [
            'auth' => 'in:ADMIN,USER',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'notes' => 'filled',
            'status' => 'numeric|max:127',
            'created_by' => 'numeric|exists:users,id',
            'updated_by' => 'numeric|exists:users,id',
            'deleted_by' => 'numeric|exists:users,id',
            'uuid' => 'uuid|unique:users',
        ];

        switch ($this->method()) {
            case 'POST':
                # STORE
                break;
            case 'PUT':
                # UPDATE
                $rule['name'] = 'filled';
                $rule['email'] = 'filled|email|unique:users';
                $rule['password'] = 'filled';
                break;
            case 'PATCH':
                # UPDATE OR INSERT
                break;
            case 'DELETE':
                # DESTROY
                break;
            default:
                # GET, INDEX, SHOW
                break;
        }

        return $rule;
    }
}
