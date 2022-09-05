<!-- Nickname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('nickname', 'Nickname:') !!}
    {!! Form::text('nickname', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-12">
    {!! Form::label('avatar', 'Avatar:') !!}
    {!! Form::url('avatar', null, ['class' => 'form-control', 'required']) !!}
</div>
