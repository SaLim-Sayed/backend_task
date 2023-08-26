@extends('welcome')

@section('title')
    All Books
@endsection
@section('content')
    <div class="row m-2">
        <div class="row">
            <h2 class="my-3 col-4">All Books</h2>
            <a href="#" class="btn btn-primary col-2 my-3" data-bs-toggle="modal" data-bs-target="#addModal">
                <i class="las la-plus">Create</i>
            </a>
            <form class="col-4  my-3" role="search">
                <input class="form-control me-2" id="keyword" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <div class="table-data bg-light">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">auther</th>
                        <th scope="col">language</th>
                        <th scope="col">page_count</th>
                        <th scope="col">size</th>
                        <th scope="col">file</th>
                        <th scope="col">operation</th>
                    </tr>
                </thead>
                <tbody id="allBooks">
                    @foreach ($books as $key => $book)
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item">An item</li>
                          <li class="list-group-item">A second item</li>
                          <li class="list-group-item">A third item</li>
                        </ul>
                        <div class="card-body">
                          <a href="#" class="card-link">Card link</a>
                          <a href="#" class="card-link">Another link</a>
                        </div>
                      </div>
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $book->title }}</td>
                            <td><iframe src="{{ asset('uploads/books/' . $book->file) }}"   height="500">
                            </iframe></td>
                            <td>{{ $book->auther }}</td>
                            <td>{{ $book->lang }}</td>
                            <td>{{ $book->page_count }}</td>
                            <td>{{ $book->size }}</td>
                            <td>{{ $book->file }} </td>
                            <td>
                                <a class=" btn btn-danger fs-5 delete_book " data-id="{{ $book->id }}" href="">
                                    <i class="las la-trash"></i>
                                </a>
                                <a href="" class=" btn btn-success fs-5 update_book_form" data-bs-toggle="modal"
                                    data-bs-target="#updateModal" data-id="{{ $book->id }}"
                                    data-title="{{ $book->title }}" data-auther="{{ $book->auther }}"
                                    data-lang="{{ $book->lang }}" data-size="{{ $book->size }}"
                                    data-page_count="{{ $book->page_count }}" data-file="{{ $book->file }}">
                                    <i class="las la-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="position-absolute bottom-0 start-0">
        {{ $books->links() }}

    </div>
@endsection
@section('scripts')
    @include('books.add_book_modal')
    @include('books.update_book_modal')
    @include('books.book_js')
@endsection
