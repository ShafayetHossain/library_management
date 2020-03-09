@extends('master')
@section('title', 'Publication')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Publication</h1>
    </div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <form class="row user" action="{{url('publication-post')}}" method="post">
                    @csrf
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-user" name="publication_name" id="" placeholder="Enter Publication Name...">
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
                    <a class="btn btn-info" href="#">Publication List</a>
                </div>
                <div class="col-md-9">
                    <table class="table">

                        <thead>

                        <tr>
                            <th>Publication ID</th>
                            <th>Publication Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($publication as $row)
                        <tr>
                            <td> {{$row->id}} </td>
                            <td> {{$row->name}} </td>

                            <td>

                                <a class="btn btn-primary" href="{{url('/publication-edit/'.$row->id)}}">Edit</a>

                                <a class="btn btn-danger" onclick="return confirm('Are You Sure!?')" href="{{url('/publication-delete/'.$row->id)}}">Delete</a>
                            </td>
                        </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>
    </div>
@endsection
