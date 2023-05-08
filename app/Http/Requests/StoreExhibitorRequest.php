<?php

namespace App\Http\Requests;

use App\Models\Exhibitor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExhibitorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exhibitor_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:exhibitors',
            ],
            'banner' => [
                'required',
            ],
            'logo' => [
                'required',
            ],
            'admins.*' => [
                'integer',
            ],
            'admins' => [
                'required',
                'array',
            ],
        ];
    }
}
