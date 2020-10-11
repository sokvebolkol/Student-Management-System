@extends(backpack_view('blank'))

@php
	// $productCount = App\Models\Product::count();
    // $userCount = App\Models\BackpackUser::count();
	// $articleCount = \Backpack\NewsCRUD\app\Models\Article::count();
	// $lastArticle = \Backpack\NewsCRUD\app\Models\Article::orderBy('date', 'DESC')->first();
	// $lastArticleDaysAgo = \Carbon\Carbon::parse($lastArticle->date)->diffInDays(\Carbon\Carbon::today());

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
