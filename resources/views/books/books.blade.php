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
            <div class="row table  m-2 text-center text-capitalize" id="allBooks">
                @foreach ($books as $key => $book)
                    <div class=" col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-3 mb-sm-0 col-12 my-3">
                        <div class="card row1">
                            <div class="card-header osition-relative">
                                <img src="{{ asset('uploads/books/' . $book->img) }}" width="200" height="200"
                                    style="overflow: hidden" />

                                <a href="{{ route('book.show', $book->id) }} "
                                    class="text-decoration-none position-absolute top-0 start-0 translate-middle badge rounded-pill bg-info">
                                    {{ $book->id }}
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $book->title }}</h5>
                                <p class="card-text text-danger">{{ $book->auther }} </p>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('book.show', $book->id) }} " class="btn btn-info fs-5">
                                    <i class="las la-info"></i>
                                </a>
                                <a href="" class=" btn btn-success fs-5 update_book_form" data-bs-toggle="modal"
                                    data-bs-target="#updateModal" data-id="{{ $book->id }}"
                                    data-title="{{ $book->title }}" data-auther="{{ $book->auther }}"
                                    data-lang="{{ $book->lang }}" data-size="{{ $book->size }}"
                                    data-page_count="{{ $book->page_count }}" data-file="{{ $book->file }}">
                                    <i class="las la-edit"></i>
                                </a>
                                <a class=" btn btn-danger fs-5 delete_book " data-id="{{ $book->id }}" href="">
                                    <i class="las la-trash"></i>
                                </a>
                                <a class=" btn btn-warning fs-5  " data-id="{{ $book->id }}"
                                    href="{{ asset('uploads/books/' . $book->file) }}" target="_blank">
                                    <i class="las la-file-pdf"></i>
                                </a>


                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{-- <div class="position-absolute bottom-0 start-0">
          {{ $books->links() }}

    </div> --}}
@endsection
@section('scripts')
    @include('books.add_book_modal')
    @include('books.update_book_modal')
    @include('books.book_js')
@endsection
