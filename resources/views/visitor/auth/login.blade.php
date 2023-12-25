@extends('website.master')

@section('title', 'Login Page')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white" align="center">LOGIN TO YOUR ACCOUNT</div>
                        <div class="card-body">
                            <h4 class="text-center text-danger">{{session('message')}}</h4>
                            <form action="{{route('user-login')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="text-primary">Email<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email Address"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="text-primary">Password<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="password" class="form-control" name="password" placeholder="Your Password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 checkbox-inline">
                                        <input type="checkbox" value=""/>Remember me
                                    </label>
                                </div>

                                <div class="row mb-3">
                                    <label class=""></label>
                                    <div class="">
                                        <input type="submit" class="btn btn-primary rounded-pill" value="Login"/>
                                    </div>
                                </div>

                                <div class="row mb-3"><a href="#">Forget email/password?</a></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </section>

@endsection


