<?php
Route::group(['prefix' => config('laraboard-admin.route.prefix', 'forum-admin'), 'middleware' => config('laraboard-admin.route.middleware', 'web')], function () {
    Laraman::resource('threads');

    Route::post('replies/{id}/delete', ['as' => config('laraboard-admin.route.prefixDot') . 'replies.delete', 'uses' => 'ReplyController@delete'])->where('id', '[0-9]+');
});