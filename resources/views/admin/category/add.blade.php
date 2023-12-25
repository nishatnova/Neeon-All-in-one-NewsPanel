@extends('admin.master')

@section('title', 'Add Category')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Category Form</h3>
                </div>
                <div class="card-body">
                    <h4 class="text-primary">{{session('message')}}</h4>
                    <form class="form-horizontal" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-0 mb-4">
                            <label for="name" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="name" name="name" placeholder="Category Name" type="text">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="imgInp" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input type="file" class="dropify" id="imgInp" name="image" data-height="200" />
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="lastName" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="lastName" placeholder="Category Description" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-md-3 form-label">Publication Status</label>
                            <div class="col-md-9 pt-2">
                                <label> <input type="radio" value="1" checked name="status"><span> Published</span> </label>
                                <label> <input type="radio" value="0" name="status"><span> Unpublished</span> </label>
                            </div>
                        </div>
                        <button class="btn btn-primary rounded-0" type="submit">Create New Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


