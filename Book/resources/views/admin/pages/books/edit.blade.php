@extends('admin.layouts.app')
@section('title','Edit Book')
@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-11">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title ">Edit Book Info</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method="POST" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          @if ($errors->any())
          <div class="alert alert-danger my-4">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
              </ul>
          </div>
          @endif
          <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" name="title"  value="{{old('title',$product->title)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
              </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Description</label>
                <input type="text" name="description"  value="{{old('description',$product->description)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="text" name="price"  value="{{old('title',$product->price)}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Category</label>
                <select name="category_id" value="{{old('category_id',$product->indcategory_id)}}" class="form-control" id="exampleFormControlSelect1">
                  @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>  
                  @endforeach
                </select>
              </div>
           
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
@stop