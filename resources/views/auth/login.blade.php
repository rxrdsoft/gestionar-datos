@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                            <h1>Iniciar sesión</h1>
                            <p class="text-muted">Iniciar sesión en su cuenta</p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" required class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contrseña">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox">
                                        <label class="text-muted">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Recordarme') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">Entrar</button>
                                </div>
                                <div class="col-6 text-right">
                                    {{--<button type="button" class="btn btn-link px-0">Forgot password?</button>--}}
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div>
                                <img class="img-thumbnail" style="background-color: transparent;
    border: none;" src="{{ asset('images/CYMEDIA-LOGO-BL.png') }}" alt="">
                                {{--<h2>Sign up</h2>--}}
                                {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}
                                {{--<button type="button" class="btn btn-primary active mt-3">Register Now!</button>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
