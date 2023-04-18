<?php

namespace App\Http\Requests;

use App\Models\ExhibitorVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExhibitorVideoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exhibitor_video_create');
    }

    public function rules()
    {
        return [
            'exhibitor_id' => [
                'required',
                'integer',
            ],
            'title' => [
                'string',
                'required',
            ],
            'video_url' => [
                'required',
            ],
        ];
    }
}
