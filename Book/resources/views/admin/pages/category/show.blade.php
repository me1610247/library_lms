@extends('admin.layouts.app')

@section('title', $category->title)

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ $category->title }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <td>{{ $book->id }}</td>
                                            <td>{{ $book->name }}</td>
                                            <td>{{ $book->status }}</td>
                                            <td>
                                                <img width="200px" src="{{ asset('image/categories/' . $book->image) }}"
                                                    alt="">
                                            </td>
                                            <td>
                                                <a class="btn btn-warning" href="{{ route('books.show', $book->id) }}">
                                                    Show
                                                </a>

                                                <a class="btn btn-primary"
                                                    href="{{ route('books.edit', $book->id) }}">Edit</a>


                                                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
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