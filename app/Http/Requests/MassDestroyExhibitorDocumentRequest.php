<?php

namespace App\Http\Requests;

use App\Models\ExhibitorDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyExhibitorDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('exhibitor_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:exhibitor_documents,id',
        ];
    }
}
