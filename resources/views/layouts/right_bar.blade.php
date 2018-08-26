<div class="col-lg-4">
    <div class="sidebars-area">
         <div class="single-sidebar-widget editors-pick-widget">
            <div class="single-sidebar">
                <h6 class="title">@lang('lang.search')</h6>
                {{ Form::open(['method' => 'get']) }}
                    {{ Form::text('search_box', null, ['class' => 'form-control', 'placeholder' => trans('lang.plh_request')]) }}
                    {{ Form::select('category_id', $allCategories, null, ['id' => 'category_id', 'class' => 'form-control select-search', 'placeholder' => trans('lang.plh_select_category')]) }}

                    {{ Form::select('rating_id', [config('setting.level_rate.medium') => trans('lang.level_rate.medium'), config('setting.level_rate.good') => trans('lang.level_rate.good'), config('setting.level_rate.awesome') => trans('lang.level_rate.awesome')], null, ['id' => 'rating_id', 'class' => 'form-control select-search', 'placeholder' => trans('lang.plh_select_rating')]) }}

                {{ Form::close() }}
            </div>
        </div>

        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">@lang('lang.top_rating_books')</h6>
            <div class="editors-pick-post">
                <div class="post-lists">
                    @foreach ($topRatingBooks as $topRatingBook)
                        <div class="single-post d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid list-books" src="{{ $topRatingBook->picture }}" alt="">
                            </div>
                            <div class="detail">
                                <a href="{{ route('book.show', $topRatingBook->id) }}">
                                    <h6>{{ $topRatingBook->title }}</h6>
                                </a>
                                <p>{{ $topRatingBook->part_of_introduction }}</p>
                                @include('layouts.introduce_book', ['book' => $topRatingBook])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">@lang('lang.most_popular')</h6>
            <div class="editors-pick-post">
                <div class="post-lists">
                    @foreach ($topCounterViewBooks as $topViewBook)
                        <div class="single-post d-flex flex-row">
                            <div class="thumb">
                                <img class="img-fluid list-books" src="{{ $topViewBook->picture }}" alt="">
                            </div>
                            <div class="detail">
                                <a href="{{ route('book.show', $topViewBook->id) }}">
                                    <h6>{{ $topViewBook->title }}</h6>
                                </a>
                                <p>{{ $topViewBook->part_of_introduction }}</p>
                                @include('layouts.introduce_book', ['book' => $topViewBook])
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
