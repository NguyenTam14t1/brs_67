<table class="table">
    <thead class="thead-light">
		<tr>
			<th>@lang('lang.title_book_request')</th>
			<th>@lang('lang.categories')</th>
			<th>@lang('lang.status')</th>
            <th>@lang('lang.function')</th>
		</tr>
    </thead>
    <tbody>
        @foreach ($listRequestBook as $bookRequest)
        	<tr>
				<td>{{ $bookRequest->title }}</td>
				<td>{{ $bookRequest->category->name }}</td>
				<td id="status-{{ $bookRequest->id }}">
                    @if($bookRequest->status == config('setting.active'))  
                        <img class="approve-request"  src="{{ config('setting.path_img_active') }}" >
                    @else
                        <img class="approve-request" src="{{ config('setting.path_img_deactive') }}" >
                    @endif
                </td>
                <td>
                    @if($bookRequest->status == config('setting.deactive'))  
                        {{ Form::open(['route' => ['request-book.edit', $bookRequest->id], 'method' => 'GET']) }}
                            {{ Form::submit(trans('admin.btn_edit'), ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                        <br>
                        {{ Form::open(['route' => ['request-book.destroy', $bookRequest->id]]) }}
                        {{ method_field('DELETE') }}
                        {{ Form::submit(trans('lang.btn_delete'), ['onclick' => 'return confirm("' . trans('admin.confirm_delete') . '")', 'class' => 'btn btn-danger']) }}
                    {{ Form::close() }}
                    @endif
                    
                </td>
			</tr>
		@endforeach
    </tbody>
</table>
<div class="load-more">
    {!! $listRequestBook->render() !!}
</div>
