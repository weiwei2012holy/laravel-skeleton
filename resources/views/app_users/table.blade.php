<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="app-users-table">
            <thead>
            <tr>
                <th>@lang('models/app_users.fields.nickname')</th>
                <th>@lang('models/app_users.fields.avatar')</th>
                <th colspan="3">@lang('crud.action')</th>
            </tr>
            </thead>
            <tbody>
            @foreach($appUsers as $appUser)
                <tr>
                    <td>{{ $appUser->nickname }}</td>
                    <td><img src="{{ $appUser->avatar }}" style="max-width: 50px"></td>
                    <td  style="width: 120px">
{{--                        {!! Form::open(['route' => ['appUsers.destroy', $appUser->id], 'method' => 'delete']) !!}--}}
                        <div class='btn-group'>
{{--                            <a href="{{ route('appUsers.show', [$appUser->id]) }}"--}}
{{--                               class='btn btn-default btn-xs'>--}}
{{--                                <i class="far fa-eye"></i>--}}
{{--                            </a>--}}
                            <a href="{{ route('appUsers.edit', [$appUser->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
{{--                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}--}}
                        </div>
{{--                        {!! Form::close() !!}--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $appUsers])
        </div>
    </div>
</div>
