@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        @lang('crud.edit') @lang('models/app_users.singular')
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($appUser, ['route' => ['appUsers.update', $appUser->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('app_users.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('appUsers.index') }}" class="btn btn-default"> {{__('crud.cancel')}} </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
