@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <div class="site-main-container">
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start single-post Area -->
                        <div class="single-post-wrap">
                            <div class="content-wrap">
                                <a href="#">
                                    <h3>{{ $bookDetail->title }}</h3>
                                </a>
                                @include('layouts.introduce_book', ['book' => $bookDetail])
                                <p>{{ $bookDetail->content }}</p>
                                <div class="comment-sec-area" id="comment-sec-area">
                                    @include('member.review', ['bookDetail' => $bookDetail])
                                </div>
                            </div>
                            <div>
                                @include('common.errors')
                                <h4>@lang('lang.reviews')</h4>
                                {{ Form::open(['review_form']) }}
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            @auth
                                                {{ Form::hidden('user_id', Auth::user()->id, ['id' => 'user_id']) }}
                                            @endauth
                                            {{ Form::hidden('book_id', $bookDetail->id, ['id' => 'book_id']) }}
                                        </div>
                                    </div>
                                    <div class="form-group form-inline">
                                        <div class="form-group col-lg-6 col-md-12 name">
                                            <h6>@lang('lang.plh_rating')</h6>
                                            <div class="demo-wrapper text-center">
                                                <fieldset class="rating">
                                                    {{ Form::radio('rating', 5, false, ['id' => 'star5']) }}
                                                    <label class = "full" for="star5" title="Awesome - 5 stars"></label>
                                                    {{ Form::radio('rating', 4, false, ['id' => 'star4']) }}
                                                    <label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                                                    {{ Form::radio('rating', 3, false, ['id' => 'star3']) }}
                                                    <label class = "full" for="star3" title="Medium - 3 stars"></label>
                                                    {{ Form::radio('rating', 2, false, ['id' => 'star2']) }}
                                                    <label class = "full" for="star2" title="Bad - 2 stars"></label>
                                                    {{ Form::radio('rating', 1, false, ['id' => 'star1']) }}
                                                    <label class = "full" for="star1" title="Extremely bad - 1 star"></label>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('message', null, ['id' => 'review', 'class' => 'form-control mb-10', 'row' => '5',  'placeholder' => trans('lang.plh_review'), 'required' => 'required']) }}
                                    </div>
                                    {{ Form::button(trans('lang.btn_submit'), ['class' => 'primary-btn text-uppercase', 'id' => 'btn_review_form', 'data-url' => route('post.review')]) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                        <!-- End single-post Area -->
                    </div>
                    @include('layouts.right_bar')
                </div>
            </div>
        </section>
    </div>    
@endsection
