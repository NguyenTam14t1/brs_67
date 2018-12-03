@if (count($listBooks))
    <table class="table table-striped">
        <thead>
            <th>@lang('lang.book_title')</th>
            <th>@lang('lang.author')</th>
            <th>@lang('lang.publish_date')</th>
            <th>@lang('lang.average_rating')</th>
            <th>@lang('lang.category')</th>
            <th>@lang('lang.introduction')</th>
            <th>@lang('lang.function')</th>
        </thead>
        <tbody>
            @foreach ($listBooks as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->publish_date }}</td>
                    <td>{{ $book->average_rating }}</td>
                    <td>
                        @foreach ($book->categories as $categories)
                            {{ $categories->name }}
                            @if (count($book->categories) > 1)
                            <hr>
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $book->part_of_introduction }}</td>
                    <td>
                        {{ Form::open(['route' => ['manager-book.destroy', $book->id]]) }}
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