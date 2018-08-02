<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>{{ trans('lang.top_books') }}</h4>
                <ul>
                    <li><a href="#">{{ trans('lang.top_book_first') }}</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>{{ trans('lang.categories') }}</h4>
                <ul>
                    <li><a href="#">{{ trans('lang.categories') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <h4>{{ trans('lang.home') }}</h4>
                <h4>{{ trans('lang.contact') }}</h4>
            </div>
            <div class="col-lg-3 col-md-6 single-footer-widget">
                <div class="footer-single-widget">
                    <h4>{{ trans('lang.subscribe') }}</h4>
                    {{ Form::open(['method' => 'POST']) }}
                        {{ Form::email('email', null, ['id' => 'eemail', 'class' => 'form-control search-box', 'placeholder' => trans('lang.plh_email')]) }}
                        {{ Form::button('<i class="fa fa-arrow-right"></i>') }}
                    {{ Form::close() }}
                </div>
            </div>
            
        </div>
        <div class="footer-bottom row align-items-center">
            <p class="footer-text m-0 col-lg-8 col-md-8">
                {{ trans('lang.copyright') }}
            </p>
            
        </div>
    </div>
</footer>
