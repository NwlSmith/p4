@extends('layouts.master')

@section('content')
    <div id='gamePage'>
        <h1>Login</h1>

        Don't have an account? <a href='/register'>Register here...</a>

        <form method='POST' action='{{ route('login') }}'>

            {{ csrf_field() }}

            <label for='email'>E-Mail Address</label>
            <input id='email' type='email' name='email' value='{{ old('email') }}' required autofocus>
            @include('includes.error-field', ['fieldName' => 'email'])
            <br>

            <label for='password'>Password</label>
            <input id='password' type='password' name='password' required>
            @include('includes.error-field', ['fieldName' => 'password'])
            <br>

            <label>
                <input type='checkbox' name='remember' {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
            <br>
            <br>

            <button type='submit' id='login' class='linkButton'>Login</button>
            <br>
            <br>

            <a class='linkButton' href='{{ route('password.request') }}'>Forgot Your Password?</a>

        </form>
    </div>
@endsection