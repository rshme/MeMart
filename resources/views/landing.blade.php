@extends('layouts.master')

@section('content')
    <div id="landing">
        <div class="content">
            <h1 class="app-name">
                App Name
            </h1>
            <h3 class="slogan">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim fugiat, officia.
            </h3>
            <div class="d-flex">
                <a href="{{ route('get.login') }}" class="btn btn-primary mx-auto" id="btn-login">
                    Masuk
                </a>
            </div>
        </div>
    </div>
@endsection
