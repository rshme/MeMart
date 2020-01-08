@extends('layouts.master')

@section('content')
    <div id="landing">
        <div class="content">
            <h1 class="app-name">
                MeMart
            </h1>
            <h3 class="slogan">
                Aplikasi Monitoring Reseller SMK Negeri I Subang
            </h3>
            <div class="d-flex">
                <a href="{{ route('get.login') }}" class="btn btn-primary mx-auto" id="btn-login">
                    Masuk
                </a>
            </div>
        </div>
    </div>
@endsection
