@extends('front.layouts.app')
@section('title','Coding Arabic')

@section('content')
<main class="pt-4">
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
                                          

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
</main>
@endsection