<?php

namespace App\Http\Requests;

use App\Models\ExhibitorVideo;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExhibitorVideoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('exhibitor_video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:exhibitor_videos,id',
        ];
    }
}
