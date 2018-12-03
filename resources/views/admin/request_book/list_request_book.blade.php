@if (count($listBooks))
    <table class="table table-striped">
        <thead>
            <th>@lang('lang.request_id')</th>
            <th>@lang('lang.book_title')</th>
            <th>@lang('lang.category')</th>
            <th>@lang('lang.user_name')</th>
            <th>@lang('lang.created_at')</th>
            <th>@lang('lang.status')</th>
            <th>@lang('lang.function')</th>
        </thead>
        <tbody>
            @foreach ($listBooks as $bookRequest)
                @php 
                    $id = $bookRequest->id;
                    $status = $bookRequest->status;
                @endphp
                <tr>
                    <td id="book-request-id">{{ $bookRequest->id }}</td>
                    <td>{{ $bookRequest->title }}</td>
                    <td>{{ $bookRequest->category->name }}</td>
                    <td>{{ $bookRequest->user->name }}</td>
                    <td>{{ $bookRequest->created_at }}</td>
                    <td id="status-request-{{ $status }}" hidden="hidden">{{ $status }}</td>
                    <td id="status-{{ $id }}">
                        @if($bookRequest->status == config('setting.active'))  
                            <img id="btn_change_status_{{ $id }}" class="approve-request"  src="{{ config('setting.path_img_active') }}" >
                        @else
                            <a href="{{ route('manager-request-book.edit', $bookRequest->id) }}"><img id="btn_change_status_{{ $id }}" class="approve-request"  src="{{ config('setting.path_img_deactive') }}" ></a>
                        @endif
                    </td>
                    <td>
                        {{ Form::open(['route' => ['manager-request-book.destroy', $bookRequest->id]]) }}
                            {{ method_field('DELETE') }}
                            {{ Form::submit(trans('lang.btn_delete'), ['onclick' => 'return confirm("' . trans('admin.confirm_delete') . '")', 'class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <ul class="pagination">
            {!! $listBooks->render() !!}
        </ul>
    </div>
@else
    <h4>@lang('admin.result_empty')</h4>
@endif