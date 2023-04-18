<?php

namespace App\Http\Requests;

use App\Models\Exhibitor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExhibitorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exhibitor_edit');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
                'unique:exhibitors,name,' . request()->route('exhibitor')->id,
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
