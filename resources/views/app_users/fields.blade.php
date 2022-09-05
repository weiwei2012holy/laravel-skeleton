<!-- Nickname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nickname', 'Nickname:') !!}
    {!! Form::text('nickname', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('avatar', 'Avatar:') !!}
    {!! Form::textarea('avatar', null, ['class' => 'form-control']) !!}
</div>