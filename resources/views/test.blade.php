@extends("master_user")
@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <form action="{{url('/book-search')}}" method="post">
                            @csrf

                            <th>

                                <input class="form-control" type="text" placeholder="Book Name" name="book">
                            </th>

                            <th>
                                <label>Search By Writer</label>
                                <select id="writer" name="writer_id">
                                    @if(\Illuminate\Support\Facades\Session::has('data'))
                                        @foreach($writers as $writer)
                                            <option class="dropdown-item"
                                                    value="{{$writer->id}}">  {{$writer->name}}  </option>
                                        @endforeach
                                    @endif
                                </select>
                            </th>

                            <th>

                                <label>Search By Category</label>
                                <select class="custom-select mr-sm-2 form-control" id="category" name="category_id">
                                    @if(\Illuminate\Support\Facades\Session::has('data'))
                                        @foreach($categories as $category)
                                            <option class="dropdown-item"
                                                    value="{{$category->id}}">  {{$category->name}}  </option>
                                        @endforeach
                                    @endif
                                </select>
                            </th>

                            <th>
                                <button class="btn blue-gradient btn-rounded btn-sm my-0" type="submit" value="1"
                                        name="search">Search
                                </button>
                            </th>

                        </form>
                    <tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td> {{$book->name}}</td>
                            <td> {{$book->category->name}}</td>
                            <td> {{$book->writer->name}}</td>
                            <td></td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>

        </div>
    </div>
@endsection
