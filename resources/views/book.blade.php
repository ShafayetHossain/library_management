@extends('master')
@section('title', 'Book')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Book</h1>
    </div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-12">
                <form class="user" action="{{url('/book-post')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="name">Book Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name"
                                       placeholder="Enter Book Name...">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="category">Select category</label>
                            <select class="custom-select mr-sm-2 form-control" id="category" name="category_id">
                                <option selected>Choose...</option>
                                @foreach($categories as $category)
                                    <option class="dropdown-item" value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="description">Book Description</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="description" id="description"
                                       placeholder="Enter Book Description...">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="writer">Select Writer</label>
                            <select class="custom-select mr-sm-2 form-control" id="writer" name="writer_id">
                                <option selected>Choose...</option>
                                @foreach($writers as $writer)
                                    <option class="dropdown-item" value="{{$writer->id}}">{{$writer->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="image">Select Image</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group col-md-6">

                            <label class="col-md-6" for="publication">Select Publication</label>
                            <select class="custom-select mr-sm-2 form-control" id="publication" name="publication_id">
                                <option selected>Choose...</option>
                                @foreach($publications as $publication)
                                    <option class="dropdown-item"
                                            value="{{$publication->id}}">{{$publication->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-md-12">
                        Save
                    </button>
                    <hr>
                </form>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-">
                <a class="btn btn-info" href="#">Record List</a>
            </div>
            <div class="col-md-">
                <table class="table">

                    <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Book Name</th>
                        <th>Book Description</th>
                        <th>Category Name</th>
                        <th>Publication Name</th>
                        <th>Writer Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td> {{$book->id}}</td>
                            <td> {{$book->name}}</td>
                            <td> {{$book->description}}</td>
                            <td> {{$book->category->name}}</td>
                            <td> {{$book->publication->name}}</td>
                            <td> {{$book->writer->name}}</td>
                            <td>
                                <img src="{{asset('images/'.$book->image)}}" height="50px" width="50px" alt="Image">
                            </td>

                            <td>

                                <a class="btn btn-primary" href="{{url('/book-edit/'.$book->id)}}">Edit</a>

                                <a class="btn btn-danger" onclick="return confirm('Are You Sure!?')" href="{{url('/book-delete/'.$book->id)}}">Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
