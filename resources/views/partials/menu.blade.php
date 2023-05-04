<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="{{ route('admin.dashboard') }}">
            <img src="https://fr.africacacongress.org/img/logo-white.png" alt="Company Logo" />
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('admin.dashboard') }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('country_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route('admin.countries.index') }}"
                    class="c-sidebar-nav-link {{ request()->is('admin/countries') || request()->is('admin/countries/*') ? 'c-active' : '' }}">
                    <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.country.title') }}
                </a>
            </li>
        @endcan
        @can('chat_management_access')
            @can('chat_room_access')
                <li class="c-sidebar-nav-item">
                    <a href="{{ route('admin.chat-rooms.index') }}"
                        class="c-sidebar-nav-link {{ request()->is('admin/chat-rooms') || request()->is('admin/chat-rooms/*') ? 'c-active' : '' }}">
                        <i class="fa-fw fas fa-comments c-sidebar-nav-icon">

                        </i>
                        {{ trans('cruds.chatRoom.title') }}
                    </a>
                </li>
            @endcan
            {{-- <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/chat-rooms*') ? 'c-show' : '' }} {{ request()->is('admin/chats*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-comment c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.chatManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('chat_room_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.chat-rooms.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/chat-rooms') || request()->is('admin/chat-rooms/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.chatRoom.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('chat_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.chats.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/chats') || request()->is('admin/chats/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-comments c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.chat.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li> --}}
        @endcan
        @can('exhibitor_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/exhibitors*') ? 'c-show' : '' }} {{ request()->is('admin/exhibitor-videos*') ? 'c-show' : '' }} {{ request()->is('admin/exhibitor-documents*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-building c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.exhibitorManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('exhibitor_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.exhibitors.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/exhibitors') || request()->is('admin/exhibitors/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fab fa-pagelines c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.exhibitor.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('exhibitor_video_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.exhibitor-videos.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/exhibitor-videos') || request()->is('admin/exhibitor-videos/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.exhibitorVideo.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('exhibitor_document_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.exhibitor-documents.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/exhibitor-documents') || request()->is('admin/exhibitor-documents/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.exhibitorDocument.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li
                class="c-sidebar-nav-dropdown {{ request()->is('admin/users*') ? 'c-show' : '' }} {{ request()->is('admin/permissions*') ? 'c-show' : '' }} {{ request()->is('admin/roles*') ? 'c-show' : '' }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.users.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.permissions.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route('admin.roles.index') }}"
                                class="c-sidebar-nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'c-active' : '' }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}"
                        href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link"
                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
