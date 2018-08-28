@extends('layouts.master')

@section('content')
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">
            <div class="container no-padding">
                <div class="row small-gutters">
                    <div class="col-lg-8 top-post-left">
                        @if(!empty($newBooks->first()))
                            <div class="feature-image-thumb relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ $newBooks->first()->picture }}" alt="">
                            </div>
                            <div class="top-post-details">
                                <a href="{{ route('book.show', $newBooks->first()->id) }}">
                                    <h3>{{ $newBooks->first()->title }}</h3>
                                </a>
                                <p>{{ $newBooks->first()->part_of_introduction }}</p>
                                @include('layouts.introduce_book', ['book' => $newBooks->first()])
                            </div>
                        @endif
                    </div>
 
                   <div class="col-lg-4 top-post-right">
                        @foreach ($newBooks as $newBook)
                            <div class="single-top-post mt-10">
                                <div class="feature-image-thumb relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ $newBook->picture }}" alt="">
                                </div>
                                <div class="top-post-details">
                                    <a href="{{ route('book.show', $newBook->id) }}">
                                        <h4>{{ $newBook->title }}</h4>
                                    </a>
                                    <p>{{ $newBook->part_of_introduction }}</p>
                                    @include('layouts.introduce_book', ['book' => $newBook])
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        @foreach ($categoryBooks as $categoryBook)
                            <div class="latest-post-wrap">
                                <h4 class="cat-title">{{ $categoryBook->name }}</h4>
                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="{{ $categoryBook->picture }}" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="{{ route('book.show', $categoryBook->id) }}">{{ $categoryBook->title }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7 post-right">
                                        <a href="{{ route('book.show', $categoryBook->id) }}">
                                            <h4>{{ $categoryBook->title }}</h4>
                                        </a>
                                        @include('layouts.introduce_book', ['book' => $categoryBook])
                                        <p class="excert">
                                            {{ $categoryBook->part_of_introduction }}
                                        </p>
                                        <a href="" class="fa fa-heart"></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="load-more">
                            {!! $categoryBooks->render() !!}
                        </div>

                    </div>
                    @include('layouts.right_bar')
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>
@endsection
