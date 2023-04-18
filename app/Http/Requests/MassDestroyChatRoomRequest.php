<?php

namespace App\Http\Requests;

use App\Models\ChatRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyChatRoomRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('chat_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:chat_rooms,id',
        ];
    }
}
