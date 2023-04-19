<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'company_create',
            ],
            [
                'id'    => 18,
                'title' => 'company_edit',
            ],
            [
                'id'    => 19,
                'title' => 'company_show',
            ],
            [
                'id'    => 20,
                'title' => 'company_delete',
            ],
            [
                'id'    => 21,
                'title' => 'company_access',
            ],
            [
                'id'    => 22,
                'title' => 'exhibitor_create',
            ],
            [
                'id'    => 23,
                'title' => 'exhibitor_edit',
            ],
            [
                'id'    => 24,
                'title' => 'exhibitor_show',
            ],
            [
                'id'    => 25,
                'title' => 'exhibitor_delete',
            ],
            [
                'id'    => 26,
                'title' => 'exhibitor_access',
            ],
            [
                'id'    => 27,
                'title' => 'exhibitor_management_access',
            ],
            [
                'id'    => 28,
                'title' => 'country_create',
            ],
            [
                'id'    => 29,
                'title' => 'country_edit',
            ],
            [
                'id'    => 30,
                'title' => 'country_show',
            ],
            [
                'id'    => 31,
                'title' => 'country_delete',
            ],
            [
                'id'    => 32,
                'title' => 'country_access',
            ],
            [
                'id'    => 33,
                'title' => 'exhibitor_video_create',
            ],
            [
                'id'    => 34,
                'title' => 'exhibitor_video_edit',
            ],
            [
                'id'    => 35,
                'title' => 'exhibitor_video_show',
            ],
            [
                'id'    => 36,
                'title' => 'exhibitor_video_delete',
            ],
            [
                'id'    => 37,
                'title' => 'exhibitor_video_access',
            ],
            [
                'id'    => 38,
                'title' => 'exhibitor_document_create',
            ],
            [
                'id'    => 39,
                'title' => 'exhibitor_document_edit',
            ],
            [
                'id'    => 40,
                'title' => 'exhibitor_document_show',
            ],
            [
                'id'    => 41,
                'title' => 'exhibitor_document_delete',
            ],
            [
                'id'    => 42,
                'title' => 'exhibitor_document_access',
            ],
            [
                'id'    => 43,
                'title' => 'chat_management_access',
            ],
            [
                'id'    => 44,
                'title' => 'chat_room_create',
            ],
            [
                'id'    => 45,
                'title' => 'chat_room_edit',
            ],
            [
                'id'    => 46,
                'title' => 'chat_room_show',
            ],
            [
                'id'    => 47,
                'title' => 'chat_room_delete',
            ],
            [
                'id'    => 48,
                'title' => 'chat_room_access',
            ],
            [
                'id'    => 49,
                'title' => 'chat_create',
            ],
            [
                'id'    => 50,
                'title' => 'chat_edit',
            ],
            [
                'id'    => 51,
                'title' => 'chat_show',
            ],
            [
                'id'    => 52,
                'title' => 'chat_delete',
            ],
            [
                'id'    => 53,
                'title' => 'chat_access',
            ],
            [
                'id'    => 54,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}