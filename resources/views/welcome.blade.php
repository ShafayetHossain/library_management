@extends("master_user")
@section("content")
    <div class="container">
        <h2 class="text-center">Book Record</h2></br>
                    <div class="row">
                        @foreach($books as $book)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#">

                                    <img style=" height: 200px;" class="card-img-top"
                                         src=" {{asset('images/'.$book->image)}}">
                                </a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">Name: {{$book->name}}</a>
                                    </h4>
                                    <h5>Writer: {{$book->writer->name}}</h5>
                                    <p class="card-text">Category: {{$book->category->name}}</p>
                                    <p class="card-text">Description: {{$book->description}}</p>
                                    <p class="card-text">Publication: {{$book->publication->name}}</p>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>

                <hr>
             </div>
        </div>
    </div>
@endsection
