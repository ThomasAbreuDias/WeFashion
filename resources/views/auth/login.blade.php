@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col s12 m10 l8 offset-m1 offset-l2">
            <div class="flow-text">Login</div>
            <div class="divider"></div>
            <form role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="row {{ $errors->has('email') ? ' has-error' : '' }}">
                    <fieldset class="input-field col s12">
                        <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required>
                        <label for="email">E-mail Address</legend>
                        @if ($errors->has('email'))
                            <div class="col s12">
                                <span class="red-text">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            </div>
                        @endif
                    </fieldset>
                </div>

                <div class="row {{ $errors->has('password') ? ' has-error' : '' }}" required>
                    <fieldset class="input-field col s12">
                        <input type="password" name="password" class="validate" min="8" id="password">
                        <label for="password">Password</label>
                        @if ($errors->has('password'))
                            <span class="red-text">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset class="col s12 input-field">
                        <label>
                            <input type="checkbox" id="remember" name="remember" class="filled-in" />
                            <span for="remember" class="control-label">Remember Me</span>
                        </label>
                    </fieldset>
                </div>
                <div class="row">
                    <fieldset class="input-field col s12">
                        <button type="submit" class="btn waves-effect waves-light green darken-1">Login</button>
                        <p>
                            <a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                        </p>
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
@endsection