@if (count($listUsers))
    <table class="table table-striped">
        <thead>
            <th>@lang('admin.user_id')</th>
            <th>@lang('admin.user_name')</th>
            <th>@lang('admin.email')</th>
            <th>@lang('admin.function')</th>
        </thead>
        <tbody>
            @foreach ($listUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ Form::open(['route' => ['manager-user.edit', $user->id], 'method' => 'GET']) }}
                            {{ Form::submit(trans('admin.btn_edit'), ['class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                        {{ Form::open(['route' => ['manager-user.destroy', $user->id]]) }}
                            {{ method_field('DELETE') }}
                            {{ Form::submit(trans('admin.btn_delete'), ['onclick' => 'return confirm("' . trans('admin.confirm_delete') . '")', 'class' => 'btn btn-danger']) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-center">
        <ul class="pagination">
            {!! $listUsers->render() !!}
        </ul>
    </div>
@else
    <h4>@lang('admin.result_empty')</h4>
@endif