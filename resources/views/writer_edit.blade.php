@extends('master')
@section('title', 'Writer')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Writer</h1>
    </div>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <form action="{{url('/writer-update/'.$writer->id)}}" method="post" class="row user">
                    @csrf
                    <div class="form-group col-md-8">
                        <input type="text" class="form-control form-control-user" name="writer_name" value= "{{$writer->name}}" id="" >
                    </div>
                    <button type="submit" class="form-group  btn btn-primary btn-user col-md-4">
                        Update
                    </button>
                    <hr>
                </form>
            </div>
        </div>

    </div>
@endsection
