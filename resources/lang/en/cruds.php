<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => ' ',
            'password'                  => 'Password',
            'password_helper'           => ' ',
            'roles'                     => 'Roles',
            'roles_helper'              => ' ',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'verified'                  => 'Verified',
            'verified_helper'           => ' ',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => ' ',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => ' ',
            'slug'                      => 'Slug',
            'slug_helper'               => ' ',
            'phone_number'              => 'Phone Number',
            'phone_number_helper'       => ' ',
            'organization'              => 'Organization',
            'organization_helper'       => ' ',
            'gender'                    => 'Gender',
            'gender_helper'             => ' ',
            'country'                   => 'Country',
            'country_helper'            => ' ',
            'avatar'                    => 'Avatar',
            'avatar_helper'             => ' ',
        ],
    ],
    'exhibitor' => [
        'title'          => 'Exhibitor',
        'title_singular' => 'Exhibitor',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'name'                => 'Name',
            'name_helper'         => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'slug'                => 'Slug',
            'slug_helper'         => ' ',
            'country'             => 'Country',
            'country_helper'      => ' ',
            'banner'              => 'Banner',
            'banner_helper'       => ' ',
            'logo'                => 'Logo',
            'logo_helper'         => ' ',
            'website_url'         => 'Website Url',
            'website_url_helper'  => ' ',
            'twitter_url'         => 'Twitter Url',
            'twitter_url_helper'  => ' ',
            'linkedin_url'        => 'Linkedin Url',
            'linkedin_url_helper' => ' ',
        ],
    ],
    'exhibitorManagement' => [
        'title'          => 'Exhibitor Management',
        'title_singular' => 'Exhibitor Management',
    ],
    'country' => [
        'title'          => 'Countries',
        'title_singular' => 'Country',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'short_code'        => 'Short Code',
            'short_code_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'exhibitorVideo' => [
        'title'          => 'Exhibitor Videos',
        'title_singular' => 'Exhibitor Video',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'exhibitor'         => 'Exhibitor',
            'exhibitor_helper'  => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'video_url'         => 'Video Url',
            'video_url_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'exhibitorDocument' => [
        'title'          => 'Exhibitor Documents',
        'title_singular' => 'Exhibitor Document',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'exhibitor'           => 'Exhibitor',
            'exhibitor_helper'    => ' ',
            'title'               => 'Title',
            'title_helper'        => ' ',
            'document_url'        => 'Document Url',
            'document_url_helper' => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'chatManagement' => [
        'title'          => 'Chat Management',
        'title_singular' => 'Chat Management',
    ],
    'chatRoom' => [
        'title'          => 'Chat Rooms',
        'title_singular' => 'Chat Room',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'slug'              => 'Slug',
            'slug_helper'       => ' ',
            'exhibitor'         => 'Exhibitor',
            'exhibitor_helper'  => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'chat' => [
        'title'          => 'Chat',
        'title_singular' => 'Chat',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'chat_room'           => 'Chat Room',
            'chat_room_helper'    => ' ',
            'sender'              => 'Sender',
            'sender_helper'       => ' ',
            'message'             => 'Message',
            'message_helper'      => ' ',
            'message_type'        => 'Message Type',
            'message_type_helper' => ' ',
            'status'              => 'Status',
            'status_helper'       => ' ',
            'attachment'          => 'Attachment',
            'attachment_helper'   => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],

];
