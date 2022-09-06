<!-- Nickname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nickname', __('models/app_users.fields.nickname')) !!}
    {!! Form::text('nickname', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-12">
    {!! Form::label('avatar', __('models/app_users.fields.avatar')) !!}
    {!! Form::url('avatar', null, ['class' => 'form-control', 'required']) !!}
</div>
