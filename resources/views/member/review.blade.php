<div class="container">
    <div class="row flex-column">
        <h6>{{ config('setting.counter_view') }}</h6>
        @foreach ($bookDetail->reviews as $review)
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="{{ asset(config('setting.path_img') . config('setting.avatar')) }}" alt="">
                        </div>
                        <div class="desc">
                            <h5><a href="#">{{ $review->user->name }}</a></h5>
                            <p class="date">{{ $review->created_at }} </p>
                            <p class="comment">
                                {{ $review->content }}
                            </p>
                            <ul>
                                <li>{!! $review->showRate($review->rating) !!}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="reply-btn">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
