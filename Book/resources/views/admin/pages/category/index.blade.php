@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>                                        
                                        <th>Image</th>                                        
                                        <th>Date</th>                                        
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td><img height="150px" width="150px" src="{{asset('/storage/images/products/'.$category->image)}}" alt=""></td>
                                            <td>{{ $category->created_at->diffForHumans() }}</td>
                                            <td>

                                                <a class="btn btn-primary mb-3"
                                                    href="{{ route('category.edit', $category->id) }}">Edit</a>


                                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-delete">
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
