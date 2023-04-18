<?php

namespace App\Http\Requests;

use App\Models\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:companies,name,' . request()->route('company')->id,
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:companies,email,' . request()->route('company')->id,
            ],
            'phone_number' => [
                'string',
                'required',
            ],
        ];
    }
}
