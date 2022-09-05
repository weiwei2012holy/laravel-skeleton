@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">登陆成功，欢迎 {{ Auth::user()->name }}</h1>
    </div>
@endsection
