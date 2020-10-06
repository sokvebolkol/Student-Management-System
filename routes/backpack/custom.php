<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    
    Route::crud('student', 'StudentCrudController');
    Route::crud('teacher', 'TeacherCrudController');
    Route::crud('library', 'LibraryCrudController');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');
<<<<<<< HEAD
    Route::crud('guardian', 'GuardianCrudController');
=======
    Route::crud('subject', 'SubjectCrudController');
    Route::crud('my_class', 'My_classCrudController');
    Route::crud('info', 'InfoCrudController');
>>>>>>> 617bb62c41edcf8afcbb0e677630716c5aa444dd
}); // this should be the absolute last line of this file