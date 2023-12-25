@extends('reporter.master')

@section('title', 'Manage Post')

@section('body')
    <!-- Start inner page Banner -->
    <div class="pt-0 banner inner-banner">
        <div class="container">
            <nav class="rt-breadcrumb-wrap" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">

                            <i class="fas fa-home"></i>
                            Dashboard

                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{route('reporter-post.create')}}">
                            Add Post
                        </a>
                    </li>

                </ol>
            </nav>
        </div>
    </div>
    <!-- End inner page Banner -->

    <div class="pt-5 contact-section-layout-1 section-padding-2">
        <div class="container">
            <div class="row gutter-30 justify-content-between">
               <div class="col-xl-3 col-lg-2">

               @include('reporter.includes.wrap')
                   <!-- <div class="list-group">
                        <a href="" class="list-group-item">My Dashboard</a>
                        <a href="" class="list-group-item">My Profile</a>
                        <a href="" class="list-group-item">My Comment</a>
                        <a href="" class="list-group-item">Change Password</a>
                        <a href="" class="list-group-item">Logout</a>
                    </div> -->
                </div>
                <div class="col-xl-9 col-lg-10 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="800ms">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <div class="card">
                        <div class="mb-0  rt-section-heading-style-2 card-header ">
                            <h5 class="mt-1 mb-1 sub-title">My Posts</h5>
                        </div>
                        <div class="pb-0 card-body">
                            <div class="table-responsive">
                                <table id="example3" class="table table-bordered text-nowrap border-bottom">
                                    <thead>
                                    <th>SL</th>
                                    <th>Post Title</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($reporterPosts as $reporterPost)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $reporterPost->title }}</td>
                                            <td><img src="{{ asset($reporterPost->image) }}" alt="" style="height: 50px ; width: 50px "></td>
                                            <td>{{ $reporterPost->short_description}}</td>
                                            <td>{{ $reporterPost->category->name}}</td>
                                            <td class="d-flex">
                                                <a href="{{route('reporterPost.edit',['id' => $reporterPost->id])}}" class="btn btn-primary btn-sm m-1" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{route('reporterPost.delete',['id' => $reporterPost->id])}}" onclick="return confirm('Are you want to delete this !!!')" class="btn btn-danger btn-sm m-1" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


@endsection
