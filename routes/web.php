<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('home');
});

Route::get('userVerification/{token}', 'UserVerificationController@approve')->name('userVerification');
Auth::routes(['register' => false]);

Route::group(['namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
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

    // Company
    Route::delete('companies/destroy', 'CompanyController@massDestroy')->name('companies.massDestroy');
    Route::post('companies/media', 'CompanyController@storeMedia')->name('companies.storeMedia');
    Route::post('companies/ckmedia', 'CompanyController@storeCKEditorImages')->name('companies.storeCKEditorImages');
    Route::resource('companies', 'CompanyController');

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
    Route::resource('exhibitor-videos', 'ExhibitorVideoController');

    // Exhibitor Document
    Route::delete('exhibitor-documents/destroy', 'ExhibitorDocumentController@massDestroy')->name('exhibitor-documents.massDestroy');
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
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});