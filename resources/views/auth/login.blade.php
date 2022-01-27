@extends('layouts.app')

@section('content')
    <div class="authentication">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-12 ">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="header">
                            <h5 class="text-center"> <img class="logo" src="https://www.42istanbul.com.tr/wp-content/uploads/2021/04/42_istanbul-1.svg" style="width: 25%" alt=""></h5>
                            <h5 class="mt-2">Giriş Yap</h5>
                        </div>
                        <div class="body">
                            <div class="input-group mb-3">
                                <input required name="email" type="text" class="form-control"
                                       placeholder="Email" value="{{ old('email') }}">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input required name="password" type="password" class="form-control"
                                       placeholder="Şifre">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></a></span>
                                </div>
                            </div>
                            <div class="checkbox">
                                <input id="remember_me" name="remember" type="checkbox">
                                <label for="remember_me">Beni Hatırla</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Giriş Yap
                            </button>
                        </div>
                    </form>

                </div>
                <div class="col-lg-8 col-sm-12">
                    <div class="card">
                        <img src="/admin/images/signin.svg" alt="Sign In"/>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
