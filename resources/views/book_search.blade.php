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
                            <label>Category</label>
                        </th>

                        <th>
                            <label>Writer</label>
                        </th>

                        <th>
                            <button class="btn btn-success" type="submit" value="1"
                                    name="search"> Search </button>
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
