@extends('reporter.master')

@section('title', 'Edit Post')

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
                    <li class="breadcrumb-item active" aria-current="page">
                        Edit Post
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End inner page Banner -->

    <!-- start contact-section-layout-1 -->
    <div class="pt-5 contact-section-layout-1 section-padding-2">
        <div class="container">
            <div class="row gutter-30 justify-content-between align-items-center">
                <div class="col-xl-1 col-lg-1"></div>

                <div class="col-xl-10 col-lg-10 wow fadeInUp" data-wow-delay="600ms" data-wow-duration="800ms">
                    <h4 class="text-primary">{{session('message')}}</h4>

                    <form action="{{ route('reporterPost.update',$reporterPost->id) }}" class="contact-form-style-1" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="rt-section-heading-style-2">
                            <h2 class="sub-title">Edit POST</h2>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id"  required>
                                    <option value="" disabled selected> -- Select Category -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$reporterPost->category_id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="title" class="col-md-3 form-label">Post Title</label>
                            <div class="col-md-9">
                                <input class="form-control" id="title" name="title" value="{{$reporterPost->title}}" type="text"/>

                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="shortDescription" class="col-md-3 form-label">Short Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="shortDescription" name="short_description">{{$reporterPost->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="summernote" class="col-md-3 form-label">Long Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control summernote" id="summernote" name="long_description">{!! $reporterPost->long_description !!}</textarea>
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Post Image</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="image" data-height="200" />
                                <img src="{{ asset($reporterPost->image) }}" height="120" width="100" id="categoryImage" alt=""/>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label class="col-md-3 form-label"></label>
                            <div class="col-md-9">
                                @if($reporterPost->status == 0 )
                                 <input type="hidden" value="0" name="status">
                                @else
                                <input type="hidden" value="1"  name="status">
                                @endif
                            </div>
                        </div>

                        <button class="mt-2 btn btn-primary rounded-pill" type="submit">Update Post</button>
                    </form>

                </div>

                <div class="col-xl-1 col-lg-1"></div>
            </div>
        </div>
    </div>

@endsection
