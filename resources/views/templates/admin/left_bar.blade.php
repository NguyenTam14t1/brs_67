<div class="sidebar" data-background-color="white" data-active-color="danger">
	<div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">{{ Auth::user()->name }}</a>
        </div>

        <ul class="nav">
        	<li>
                <a href="{{ route('manager-user.index') }}">
                    <i class="ti-map"></i>
                    <p>@lang('admin.list_user')</p>
                </a>
            </li>
        	 <li>
                <a href="{{ route('manager-request-book.index') }}">
                    <i class="ti-view-list-alt"></i>
                    <p>@lang('admin.list_request_book')</p>
                </a>
            </li>
            <li>
                <a href="{{ route('manager-book.index') }}">
                    <i class="ti-panel"></i>
                    <p>@lang('admin.list_book')</p>
                </a>
            </li>
        </ul>
	</div>
</div>