<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('home')->with('status', session('status'));
    }

    return redirect()->route('home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes(['register' => false]);

Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('exhibitor/{slug}/details', 'HomeController@exhibitorDetails')->name('exhibitor-details');
    Route::get('exhibitor/{slug}/video/create', 'HomeController@exhibitorVideoUpload')->name('exhibitor-video-create');
    Route::get('profile/{slug}/exhibitor', 'HomeController@exhibitorAccountEdit')->name('exhibitor-account-edit');
    Route::get('chat', 'HomeController@chat')->name('chat');
    Route::post('chat/create/direct-message', 'HomeController@createDirectMessage')->name('create-direct-message');
    Route::get('chat/{userSlug}/direct-message', 'HomeController@chatDirectMessage')->name('direct-message');
    Route::post('chat-create/direct-message', 'HomeController@createChatDirectMessage')->name('create.direct-message');
    Route::get('chat-room/{slug}/view-conversation', 'HomeController@chatRoomConversation')->name('chat-room-conversation');
    Route::get('chat-room/{slug}/status', 'HomeController@statusChatRoom')->name('chat-room.status');
    Route::get('exhibitor-video/{slug}/create', 'HomeController@exhibitorVideoCreate')->name('exhibitor-video-create');
    Route::get('exhibitor-document/{slug}/create', 'HomeController@exhibitorDocumentCreate')->name('exhibitor-document-create');
    Route::post('exhibitor/admin/{exhibitorSlug}/add', 'HomeController@exhibitorAdminAdd')->name('admin-add');
    Route::get('exhibitor/{userSlug}/admin/{exhibitorSlug}/remove', 'HomeController@exhibitorAdminRemove')->name('admin-remove');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', 'HomeController@dashboard')->name('dashboard');

        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
        Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
        Route::resource('users', 'UsersController');

        // Exhibitor
        Route::delete('exhibitors/destroy', 'ExhibitorController@massDestroy')->name('exhibitors.massDestroy');
        Route::post('exhibitors/media', 'ExhibitorController@storeMedia')->name('exhibitors.storeMedia');
        Route::post('exhibitors/ckmedia', 'ExhibitorController@storeCKEditorImages')->name('exhibitors.storeCKEditorImages');
        Route::resource('exhibitors', 'ExhibitorController');

        // Countries
        Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
        Route::resource('countries', 'CountriesController');

        // Exhibitor Video
        Route::delete('exhibitor-videos/destroy', 'ExhibitorVideoController@massDestroy')->name('exhibitor-videos.massDestroy');
        Route::post('exhibitor-videos/media', 'ExhibitorVideoController@storeMedia')->name('exhibitor-videos.storeMedia');
        Route::post('exhibitor-videos/ckmedia', 'ExhibitorVideoController@storeCKEditorImages')->name('exhibitor-videos.storeCKEditorImages');
        Route::resource('exhibitor-videos', 'ExhibitorVideoController');

        // Exhibitor Document
        Route::delete('exhibitor-documents/destroy', 'ExhibitorDocumentController@massDestroy')->name('exhibitor-documents.massDestroy');
        Route::post('exhibitor-documents/media', 'ExhibitorDocumentController@storeMedia')->name('exhibitor-documents.storeMedia');
        Route::post('exhibitor-documents/ckmedia', 'ExhibitorDocumentController@storeCKEditorImages')->name('exhibitor-documents.storeCKEditorImages');
        Route::resource('exhibitor-documents', 'ExhibitorDocumentController');

        // Chat Room
        Route::delete('chat-rooms/destroy', 'ChatRoomController@massDestroy')->name('chat-rooms.massDestroy');
        Route::resource('chat-rooms', 'ChatRoomController');

        // Chat
        Route::delete('chats/destroy', 'ChatController@massDestroy')->name('chats.massDestroy');
        Route::post('chats/media', 'ChatController@storeMedia')->name('chats.storeMedia');
        Route::post('chats/ckmedia', 'ChatController@storeCKEditorImages')->name('chats.storeCKEditorImages');
        Route::resource('chats', 'ChatController');
    });
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
