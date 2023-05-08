<?php

namespace App\Http\Controllers\Admin;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use App\Models\Chat;
use App\Models\Exhibitor;
use App\Models\ExhibitorVideo;
use App\Models\User;
use Inertia\Inertia;
use Gate;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController
{
    public function index()
    {
        $exhibitors = Exhibitor::with(['country', 'media'])->get();
        return Inertia::render('Home', [
            'exhibitors' => $exhibitors
        ]);
    }

    public function exhibitorDetails($slug)
    {
        $exhibitor = Exhibitor::where('slug', $slug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        return Inertia::render('exhibitors/ExhibitorDetails', [
            'exhibitor' => $exhibitor->load('country', 'exhibitorDocument', 'exhibitorVideo', 'admins'),
            "user" => auth()->user()
        ]);
    }

    public function statusChatRoom($slug)
    {
        $exhibitor = Exhibitor::where('slug', $slug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        $chatRoom = $exhibitor->chatRooms()->first();
        if (!$chatRoom) {
            return redirect()->route('home');
        }
        $chatRoom->status = !$chatRoom->status;
        $chatRoom->save();
        return redirect()->back()->with('message', 'Chat Room Status Updated Successfully');
    }

    public function exhibitorVideoCreate($slug)
    {
        abort_if(Gate::denies('exhibitor_video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor = Exhibitor::where('slug', $slug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        // check if the user is the owner of the exhibitor or assigned as admin to the exhibitor
        if ($exhibitor->admins()->where('id', auth()->user()->id)->count() == 0 && $exhibitor->user_id != auth()->user()->id) {
            return redirect()->route('home');
        }
        return view('admin.exhibitors.add-video', compact('exhibitor'));
    }

    public function exhibitorDocumentCreate($slug)
    {
        abort_if(Gate::denies('exhibitor_document_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor = Exhibitor::where('slug', $slug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        // check if the user is the owner of the exhibitor or assigned as admin to the exhibitor
        if ($exhibitor->admins()->where('id', auth()->user()->id)->count() == 0 && $exhibitor->user_id != auth()->user()->id) {
            return redirect()->route('home');
        }
        return view('admin.exhibitors.add-document', compact('exhibitor'));
    }

    public function exhibitorAdminRemove($userSlug, $exhibitorSlug)
    {
        abort_if(Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor = Exhibitor::where('slug', $exhibitorSlug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        // check if the user is the owner of the exhibitor or assigned as admin to the exhibitor
        if ($exhibitor->admins()->where('id', auth()->user()->id)->count() == 0 && $exhibitor->user_id != auth()->user()->id) {
            return redirect()->route('home');
        }
        $user = User::where('slug', $userSlug)->first();
        if (!$user) {
            return redirect()->route('home');
        }
        $exhibitor->admins()->detach($user->id);
        return redirect()->back()->with('message', 'Admin Removed Successfully');
    }

    public function exhibitorAdminAdd(Request $request, $slug)
    {
        abort_if(Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor = Exhibitor::where('slug', $slug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        // check if the user is the owner of the exhibitor or assigned as admin to the exhibitor
        if ($exhibitor->admins()->where('id', auth()->user()->id)->count() == 0 && $exhibitor->user_id != auth()->user()->id) {
            return redirect()->route('home');
        }
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User Not Found. Request user to register first');
        }
        // check if the user is already an admin
        if ($exhibitor->admins()->where('id', $user->id)->count() > 0) {
            return redirect()->back()->with('error', 'User is already an admin');
        }
        $exhibitor->admins()->attach($user->id);
        return redirect()->back()->with('message', 'Admin Added Successfully');
    }

    public function exhibitorAccountEdit($slug)
    {
        abort_if(Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor = Exhibitor::where('slug', $slug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        // check if the user is the owner of the exhibitor or assigned as admin to the exhibitor
        if ($exhibitor->admins()->where('id', auth()->user()->id)->count() == 0 && $exhibitor->user_id != auth()->user()->id) {
            return redirect()->route('home');
        }
        $exhibitorDocuments = $exhibitor->exhibitorDocument()->get();
        $exhibitorVideos = $exhibitor->exhibitorVideo()->get();
        $chatRooms = $exhibitor->chatRooms()->get();
        return view('edit-exhibitor', compact('exhibitor', 'exhibitorDocuments', 'exhibitorVideos', 'chatRooms'));
    }

    public function exhibitorVideoUpload(Request $request, $slug)
    {
        abort_if(Gate::denies('exhibitor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $exhibitor = Exhibitor::where('slug', $slug)->first();
        if (!$exhibitor) {
            return redirect()->route('home');
        }
        // check if the user is the owner of the exhibitor or assigned as admin to the exhibitor
        if ($exhibitor->admins()->where('id', auth()->user()->id)->count() == 0 && $exhibitor->user_id != auth()->user()->id) {
            return redirect()->route('home');
        }

        $request->request->add(['exhibitor_id' => $exhibitor->id]);

        $exhibitorVideo = ExhibitorVideo::create($request->all());

        if ($request->input('video', false)) {
            $exhibitorVideo->addMedia(storage_path('tmp/uploads/' . basename($request->input('video'))))->toMediaCollection('video');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $exhibitorVideo->id]);
        }

        return redirect()->back()->with('success', 'Video uploaded successfully');
    }

    public function chat()
    {
        return Inertia::render('chat/Index', [
            "user" => auth()->user()
        ]);
    }

    public function dashboard()
    {
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $settings1 = [
            'chart_title'           => 'Users',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\User',
            'group_by_field'        => 'email_verified_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'user',
        ];

        $settings1['total_number'] = 0;
        if (class_exists($settings1['model'])) {
            $settings1['total_number'] = $settings1['model']::when(isset($settings1['filter_field']), function ($query) use ($settings1) {
                if (isset($settings1['filter_days'])) {
                    return $query->where(
                        $settings1['filter_field'],
                        '>=',
                        now()->subDays($settings1['filter_days'])->format('Y-m-d')
                    );
                } elseif (isset($settings1['filter_period'])) {
                    switch ($settings1['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings1['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings1['aggregate_function'] ?? 'count'}($settings1['aggregate_field'] ?? '*');
        }

        $settings2 = [
            'chart_title'           => 'Exhibitor',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Exhibitor',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'exhibitor',
        ];

        $settings2['total_number'] = 0;
        if (class_exists($settings2['model'])) {
            $settings2['total_number'] = $settings2['model']::when(isset($settings2['filter_field']), function ($query) use ($settings2) {
                if (isset($settings2['filter_days'])) {
                    return $query->where(
                        $settings2['filter_field'],
                        '>=',
                        now()->subDays($settings2['filter_days'])->format('Y-m-d')
                    );
                } elseif (isset($settings2['filter_period'])) {
                    switch ($settings2['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings2['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings2['aggregate_function'] ?? 'count'}($settings2['aggregate_field'] ?? '*');
        }

        $settings3 = [
            'chart_title'           => 'Chat Rooms',
            'chart_type'            => 'number_block',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\ChatRoom',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-3',
            'entries_number'        => '5',
            'translation_key'       => 'chatRoom',
        ];

        $settings3['total_number'] = 0;
        if (class_exists($settings3['model'])) {
            $settings3['total_number'] = $settings3['model']::when(isset($settings3['filter_field']), function ($query) use ($settings3) {
                if (isset($settings3['filter_days'])) {
                    return $query->where(
                        $settings3['filter_field'],
                        '>=',
                        now()->subDays($settings3['filter_days'])->format('Y-m-d')
                    );
                } elseif (isset($settings3['filter_period'])) {
                    switch ($settings3['filter_period']) {
                        case 'week':
                            $start = date('Y-m-d', strtotime('last Monday'));
                            break;
                        case 'month':
                            $start = date('Y-m') . '-01';
                            break;
                        case 'year':
                            $start = date('Y') . '-01-01';
                            break;
                    }
                    if (isset($start)) {
                        return $query->where($settings3['filter_field'], '>=', $start);
                    }
                }
            })
                ->{$settings3['aggregate_function'] ?? 'count'}($settings3['aggregate_field'] ?? '*');
        }

        $settings4 = [
            'chart_title'           => 'Latest Exhibitors',
            'chart_type'            => 'latest_entries',
            'report_type'           => 'group_by_date',
            'model'                 => 'App\Models\Exhibitor',
            'group_by_field'        => 'created_at',
            'group_by_period'       => 'day',
            'aggregate_function'    => 'count',
            'filter_field'          => 'created_at',
            'group_by_field_format' => 'd/m/Y H:i:s',
            'column_class'          => 'col-md-12',
            'entries_number'        => '20',
            'fields'                => [
                'name'   => '',
                'status' => '',
            ],
            'translation_key' => 'exhibitor',
        ];

        $settings4['data'] = [];
        if (class_exists($settings4['model'])) {
            $settings4['data'] = $settings4['model']::latest()
                ->take($settings4['entries_number'])
                ->get();
        }

        if (!array_key_exists('fields', $settings4)) {
            $settings4['fields'] = [];
        }

        $chatMessages = Chat::all();


        return view('admin.dashboard', compact('settings1', 'settings2', 'settings3', 'settings4', 'chatMessages'));
    }
}
