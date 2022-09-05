<!-- Nickname Field -->
<div class="col-sm-12">
    {!! Form::label('nickname', 'Nickname:') !!}
    <p>{{ $appUser->nickname }}</p>
</div>

<!-- Avatar Field -->
<div class="col-sm-12">
    {!! Form::label('avatar', 'Avatar:') !!}
    <p><img src="{{ $appUser->avatar }}" alt=""></p>
</div>

