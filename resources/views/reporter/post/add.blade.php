@extends('reporter.master')

@section('title', 'Add Post')

@section('body')
    <!-- Start inner page Banner -->
    <div class="banner inner-banner">
        <div class="container">
            <nav class="rt-breadcrumb-wrap" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('reporter-dashboard')}}">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>
                    </li>

                    <li class="breadcrumb-item active" aria-current="page">
                        Add Post
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End inner page Banner -->

    <!-- start contact-section-layout-1 -->
    <div class="pt-5 contact-section-layout-1 section-padding-2">
        <div class="container">
            <div class="row gutter-30 justify-content-between">
                <div class="col-xl-3 col-lg-2">
                    @include('reporter.includes.wrap')
                </div>

                    <div class="col-xl-9 col-lg-10 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="800ms">
                        <h4 class="text-primary">{{session('message')}}</h4>
                        <form action="{{route('reporter-post.store')}}" class="contact-form-style-1" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="rt-section-heading-style-2">
                                <h2 class="sub-title">ADD POST</h2>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3 form-label">Category Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="category_id" required >
                                        <option value="" disabled selected> -- Select Category -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"> {{$category->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label for="title" class="col-md-3 form-label">Post Title</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="title" name="title" placeholder="Post title" type="text"/>

                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="shortDescription" class="col-md-3 form-label">Short Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="shortDescription" name="short_description" placeholder="Product Short Description" ></textarea>

                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="summernote" class="col-md-3 form-label">Long Description</label>
                                <div class="col-md-9">
                                    <textarea class=" summernote" id="summernote" name="long_description" placeholder="Product Long Description"></textarea>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <label for="imgInp" class="col-md-3 form-label">Post Image</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="image" data-height="200" />

                                </div>
                            </div>

                            <div class="row">
                                <label class="col-md-3 form-label">Publication Status</label>
                                <div class="col-md-9">
                                    <label> <input type="hidden" value="0" checked name="status"><span> Unpublished</span> </label>
                                </div>
                            </div>

                            <button type="submit" class="mt-5 btn btn-primary rounded-pill">Submit Now</button>

                        </form>
                    </div>

                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end contact-section-layout-1 -->

@endsection
