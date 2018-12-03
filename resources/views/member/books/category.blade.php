@extends('layouts.master')

@section('title')

@endsection

@section('content')
    <div class="site-main-container">
        <!-- Start top-post Area -->
        <section class="top-post-area pt-10">

        </section>
        <!-- End top-post Area -->
        <!-- Start latest-post Area -->
        <section class="latest-post-area pb-120">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-lg-8 post-list">
                        <!-- Start latest-post Area -->
                        <div class="latest-post-wrap">
                            <h4 class="cat-title">{{ $category->name }}</h4>
                            @foreach ($booksOfCategory as $book)
                                <div class="single-latest-post row align-items-center">
                                    <div class="col-lg-5 post-left">
                                        <div class="feature-img relative">
                                            <div class="overlay overlay-bg"></div>
                                            <img class="img-fluid" src="{{ $book->picture }}" alt="">
                                        </div>
                                        <ul class="tags">
                                            <li><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-7 post-right">
                                        <a href="{{ route('book.show', $book->id) }}">
                                            <h4>{{ $book->title }}</h4>
                                        </a>

                                        @include('layouts.introduce_book', ['book' => $book])

                                        <p class="excert">
                                            {{ $book->part_of_introduction }}
                                        </p>
                                        <a href="" class="fa fa-heart"></a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- End latest-post Area -->
                    </div>
                    @include('layouts.right_bar')
                </div>
            </div>
        </section>
        <!-- End latest-post Area -->
    </div>
@endsection
