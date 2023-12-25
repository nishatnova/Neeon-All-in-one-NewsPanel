@extends('website.master')

@section('title', 'Login Page')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white" align="center">REGISTER NOW!</div>
                        <div class="card-body">

                            <form action="{{route('user-register')}}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <label class="text-primary">Full Name<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="name" class="form-control" name="name"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="text-primary">Email Address<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="email" class="form-control" name="email"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="text-primary">Password<sup>*</sup></label>
                                    <div class="mt-2">
                                        <input type="password" class="form-control" name="password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="text-primary">Repeat Password</label>
                                    <div class="mt-2">
                                        <input type="password" class="form-control" name="password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class=""></label>
                                    <div class="">
                                        <input type="submit" class="btn btn-primary" value="Register"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>

@endsection


