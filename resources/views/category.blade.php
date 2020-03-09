@extends('master')
@section('title', 'Category')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category</h1>
    </div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <form action="{{url('/category-post')}}" method="post" class="row user">
                    @csrf
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-user" name="CategoryName"  id="" placeholder="Enter Category Name...">
                    </div>
                    <button type="submit" class="form-group  btn btn-primary btn-user col-md-4">
                        Save
                    </button>
                    <hr>
                </form>
            </div>
        </div>

        <br><br>
            <div class="row">
                <div class="col-md-3">
                    <a class="btn btn-info" href="#">Category List</a>
                </div>
                <div class="col-md-9">
                    <table class="table">

                        <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categories as $row)
                        <tr>
                            <td> {{$row->id}} </td>
                            <td> {{$row->name}}  </td>

                            <td>

                                <a class="btn btn-primary" href="{{url('/category-edit/'.$row->id)}}">Edit</a>

                                <a class="btn btn-danger" onclick="return confirm('Are You Sure!?')" href="{{url('/category-delete/'.$row->id)}}">Delete</a>
                            </td>
                        </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>

    </div>
@endsection
