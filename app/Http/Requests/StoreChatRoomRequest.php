<?php

namespace App\Http\Requests;

use App\Models\ChatRoom;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreChatRoomRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('chat_room_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                'unique:chat_rooms',
            ],
            'exhibitor_id' => [
                'required',
                'integer',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
