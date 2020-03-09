@extends('master')
@section('title', 'Edit Book')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Book</h1>
    </div>

    <div class="container">
    <?php
    $categories = \App\Category::get();
    $writers = \App\Writer::get();
    $publications = \App\Publication::get();
    ?>
    <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-12">
                <form class="user" action="{{url('/book-update/'.$book->id)}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="name">Book Name</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" value="{{$book->name}}" id="name"
                                       placeholder="Enter Book Name...">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="category">Select category</label>
                            <select class="custom-select mr-sm-2 form-control" id="category" name="category_id">
                                {{--                                <option selected>Choose...</option>--}}

                                <option class="dropdown-item" value="{{$book->category_id}}">{{$book->category->name}}</option>


                                @foreach($categories as $category)
                                    @if($book->category_id != $category->id)
                                        <option class="dropdown-item" value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="description">Book Description</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="description"
                                       value="{{$book->description}}" id="description" placeholder="Enter Book Description...">
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="writer">Select Writer</label>
                            <select class="custom-select mr-sm-2 form-control" id="writer" name="writer_id">
                                <option class="dropdown-item"
                                        value="{{$book->writer_id}}">{{$book->writer->name}}</option>

                                @foreach($writers as $writer)
                                    @if($book->writer_id != $writer->id)
                                    <option class="dropdown-item" value="{{$book->id}}">{{$writer->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    </div>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-md-6" for="image">Select Image</label>
                            <div class="form-group">
                                <input type="file" class="form-control" name="image"
                                       value="{{asset('images/'.$book->image)}}" accept="image/*">
                                <span><img src="{{asset('images/'.$book->image)}}" height="50px" width="50px"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">

                            <label class="col-md-6" for="publication">Select Publication</label>
                            <select class="custom-select mr-sm-2 form-control" id="publication" name="publication_id">
                                {{--                                <option selected>Choose...</option>--}}
                                <option class="dropdown-item"
                                        value="{{$book->publication_id}}">{{$book->publication->name}}</option>
                                @foreach($publications as $publication)
                                    @if($book->publication_id != $publication->id)
                                    <option class="dropdown-item" value="{{$publication->id}}">{{$publication->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-md-12">
                        Update
                    </button>
                    <hr>
                </form>
            </div>
        </div>

    </div>
@endsection
