@extends('admin.layouts.app')
@section('title','Create Book')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-11">
      <!-- general form elements -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title mb-5">Create Book</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <a class="btn btn-primary" href="{{route('products.index')}}">See All Books</a>
        <form method="POST" action="{{route('products.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" name="title"  value="{{old('name')}}" class="form-control" id="exampleInputEmail1" 
              placeholder="Enter Name">
            </div>
            @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
              <label for="exampleInputEmail1">Price</label>
              <input type="text" name="price"  value="{{old('price')}}" class="form-control" id="exampleInputEmail1" 
              placeholder="Enter Price">
            </div>
            @error('price')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
            <div class="form-group">
              <label for="exampleInputEmail1">Category</label>
              <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                <option selected disabled value="">Choose a Category</option>
                @foreach ($categories as $category)
                  <option value="{{$category->id}}">{{$category->name}}</option>  
                @endforeach
              </select>
            </div>
            @error('category_id')
            <div class="alert alert-danger">
                {{ 'You Must Choose a Category' }}
            </div>
        @enderror
            <div class="form-group">
              <label for="exampleInputEmail1">Description</label>
              <input type="text" name="description" value="{{old('description')}}" class="form-control"  placeholder="Enter Description">
            </div>
            @error('description')
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