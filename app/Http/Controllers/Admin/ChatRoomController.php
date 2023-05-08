<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChatRoomRequest;
use App\Http\Requests\StoreChatRoomRequest;
use App\Http\Requests\UpdateChatRoomRequest;
use App\Models\ChatRoom;
use App\Models\Exhibitor;
use App\Models\User;
use Gate;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ChatRoomController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('chat_room_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chatRooms = ChatRoom::with(['exhibitor', 'created_by'])->get();

        return view('admin.chatRooms.index', compact('chatRooms'));
    }

    public function create()
    {
        abort_if(Gate::denies('chat_room_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitors = Exhibitor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.chatRooms.create', compact('created_bies', 'exhibitors'));
    }

    public function store(StoreChatRoomRequest $request)
    {
        $request->request->add(['created_by_id' => auth()->user()->id, 'slug' => Str::slug($request->name, '-')]);
        $chatRoom = ChatRoom::create($request->all());

        return redirect()->back()->with('message', 'Chat Room Created Successfully');
    }

    public function edit(ChatRoom $chatRoom)
    {
        abort_if(Gate::denies('chat_room_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitors = Exhibitor::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $chatRoom->load('exhibitor', 'created_by');

        return view('admin.chatRooms.edit', compact('chatRoom', 'created_bies', 'exhibitors'));
    }

    public function update(UpdateChatRoomRequest $request, ChatRoom $chatRoom)
    {
        $chatRoom->update($request->all());

        return redirect()->route('admin.chat-rooms.index');
    }

    public function show(ChatRoom $chatRoom)
    {
        abort_if(Gate::denies('chat_room_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chatRoom->load('exhibitor', 'created_by');

        return view('admin.chatRooms.show', compact('chatRoom'));
    }

    public function destroy(ChatRoom $chatRoom)
    {
        abort_if(Gate::denies('chat_room_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $chatRoom->delete();

        return back();
    }

    public function massDestroy(MassDestroyChatRoomRequest $request)
    {
        $chatRooms = ChatRoom::find(request('ids'));

        foreach ($chatRooms as $chatRoom) {
            $chatRoom->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
