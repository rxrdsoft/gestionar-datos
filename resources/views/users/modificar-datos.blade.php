@extends('layouts.master')
@section('content')
    <main class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mx-4" style="margin-top: 40px">
                        <div class="card-body p-4">
                            <form action="{{ route('store.datos') }}" method="POST">
                                @csrf
                            <h1>Actualizar datos</h1>
                            <p class="text-muted"></p>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-user"></i>
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Nombre" value="{{ Auth::user()->name }}" required>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" value="{{ Auth::user()->email }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-block btn-success">Actualizar datos</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection