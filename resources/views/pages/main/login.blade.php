@extends('layouts.layout')

@section('title') Login @endsection
@section('description') Log into your account. @endsection
@section('keywords') shop, online, login @endsection

@section('content')

    <div class="container min-vh-100 mt-4">
        @if(Session::get('error'))
        <div class="alert alert-danger" role="alert">
            {{Session::get('error')}}
        </div>
        @endif
        <form action="{{route('doLogin')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" />
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
    </div>
@endsection