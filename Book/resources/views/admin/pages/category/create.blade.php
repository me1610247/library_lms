@extends('admin.layouts.app')
@section('title','Create Category')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-11">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create New Category</h3>
        </div>
        <a class="btn btn-primary mb-5" href="{{route('category.index')}}">See All Categories</a>

        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="name" value="{{old('name')}}" class="form-control"  placeholder="Enter Title">
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
            <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
                </div>
              </div>
            </div>
            @error('image')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
          
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
@stop