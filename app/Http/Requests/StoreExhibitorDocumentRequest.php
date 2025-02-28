<?php

namespace App\Http\Requests;

use App\Models\ExhibitorDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExhibitorDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exhibitor_document_create');
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
            'document' => [
                'required',
            ],
        ];
    }
}
