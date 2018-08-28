<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>@lang('lang.top_books')</h4>
                @foreach ($topRatingBooks as $topRatingBook)
                <ul>
                    <li><a href="{{ route('book.show', $topRatingBook->id) }}">{{ $topRatingBook->title }}</a></li>
                </ul>
                @endforeach
            </div>
            
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>@lang('lang.categories')</h4>
                @foreach ($categories as $category)
                <ul>
                    <li><a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                </ul>
                @endforeach
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4><a href="{{ route('book.index') }}">@lang('lang.home')</a></h4>
                <h4><a href="#">@lang('lang.contact')</a></h4>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <div class="footer-single-widget">
                    <h4>@lang('lang.subscribe')</h4>
                    {{ Form::open() }}
                        {{ Form::email('email', null, ['id' => 'eemail', 'placeholder' => trans('lang.plh_email')]) }}
                        {{ Form::button('<i class="fa fa-arrow-right"></i>') }}
                    {{ Form::close() }}
                </div>
            </div>
            
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-8">
                @lang('lang.copyright')
            </p>
            
        </div>
    </div>
</footer>
