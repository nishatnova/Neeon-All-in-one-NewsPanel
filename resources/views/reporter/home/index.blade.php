@extends('reporter.master')

@section('title', 'Reporter-dashboard')

@section('body')

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1>Hey Reporter {{Session::get('reporter_name')}}!</h1>
                    <h2>Welcome in your account.</h2>
                </div>
            </div>
        </div>
    </section>

@endsection


