@extends('layouts.master')

@section('content')
    <div id='gamePage'>
        <h1>Register</h1>

        Already have an account? <a href='/login'>Login here...</a>

        <form method='POST' action='{{ route('register') }}'>
            {{ csrf_field() }}

            <label for='name'>Name</label>
            <input id='name' type='text' name='name' value='{{ old('name') }}' required autofocus>
            @include('includes.error-field', ['fieldName' => 'name'])
            <br>

            <label for='email'>E-Mail Address</label>
            <input id='email' type='email' name='email' value='{{ old('email') }}' required>
            @include('includes.error-field', ['fieldName' => 'email'])
            <br>

            <label for='password'>Password (min: 8)</label>
            <input id='password' type='password' name='password' required>
            @include('includes.error-field', ['fieldName' => 'password'])
            <br>

            <label for='password-confirm'>Confirm Password</label>
            <input id='password-confirm' type='password' name='password_confirmation' required>
            <br>

            <button type='submit' class='linkButton'>Register</button>
            <br>
        </form>
    </div>
@endsection