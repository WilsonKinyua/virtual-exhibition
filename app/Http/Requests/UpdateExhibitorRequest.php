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
            'name' => [
                'string',
                'required',
                'unique:exhibitors,name,',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'banner' => [
                // 'required',
            ],
            'logo' => [
                'required',
            ],
            'admins.*' => [
                'integer',
            ],
            'admins' => [
                // 'required',
                'array',
            ],
        ];
    }
}
