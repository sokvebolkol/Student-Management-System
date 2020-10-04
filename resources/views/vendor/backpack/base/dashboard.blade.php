@extends(backpack_view('blank'))

@php
	// $productCount = App\Models\Product::count();
    // $userCount = App\Models\BackpackUser::count();
	// $articleCount = \Backpack\NewsCRUD\app\Models\Article::count();
	// $lastArticle = \Backpack\NewsCRUD\app\Models\Article::orderBy('date', 'DESC')->first();
	// $lastArticleDaysAgo = \Carbon\Carbon::parse($lastArticle->date)->diffInDays(\Carbon\Carbon::today());

	$widgets['after_content'][] = [
	  'type' => 'div',
	  'class' => 'row',
	  'content' => [ // widgets
      [
            'type'        => 'progress',
            'class'       => 'card text-white bg-primary mb-2',
            'value'       => '11.456',
            'description' => 'Registered users.',
            'progress'    => 57, // integer
            'hint'        => '8544 more until next milestone.',
        ],
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-info mb-2',
            'value'       => '11.456',
            'description' => 'Registered users.',
            'progress'    => 57, // integer
            'hint'        => '8544 more until next milestone.',
        ],
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-warning mb-2',
            'value'       => '11.456',
            'description' => 'Registered users.',
            'progress'    => 57, // integer
            'hint'        => '8544 more until next milestone.',
        ],
        [
            'type'        => 'progress',
            'class'       => 'card text-white bg-success mb-2',
            'value'       => '11.456',
            'description' => 'Registered users.',
            'progress'    => 57, // integer
            'hint'        => '8544 more until next milestone.',
        ],
	  ]
    ];

    Widget::add([
    'type'       => 'chart',
    'controller' => \App\Http\Controllers\Admin\Charts\WeeklyUsersChartController::class,
    'class'   => 'card mb-2',
    'wrapper' => ['class'=> 'col-md-12'] ,
    'content' => [
         'header' => 'New Users',
         'body'   => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>',
    ],
]);

@endphp

@section('content')
@endsection
