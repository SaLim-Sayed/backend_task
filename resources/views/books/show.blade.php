@extends('welcome')

@section('title')
    Book : {{ $book->id }}
@endsection
@section('content')
    <div class="card">
        <div class="row m-2 text-center text-capitalize">
            <div class="card-header position-relative">
                <h3 class="card-title "><strong> Book : {{ $book->id }} | {{ $book->title }}</strong></h3>
                <a href="{{ route('book.show', $book->id) }}"
                    class="text-decoration-none position-absolute top-0 start-0 translate-middle badge rounded-pill bg-info">
                    {{ $book->id }}
                </a>
            </div>
            <div class="card-body row">
                <div class="col-lg-4  col-md-12 col-sm-12">
                    <ul class="list-group">
                        <li class="list-group-item">Auther : {{ $book->auther }}</li>
                        <li class="list-group-item">Page Count : {{ $book->page_count }}</li>
                        <li class="list-group-item">Language : {{ $book->lang }}</li>
                        <li class="list-group-item">Book Size : {{ $book->size }}</li>
                    </ul>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <li class="list-group-item">
                        <a href="{{ asset('uploads/books/' . $book->file) }}">Download PDF</a>
                        <div id="detail_div_a4">
                            <embed src="{{ asset('uploads/books/' . $book->file) }}" type="application/pdf" width="100%"
                                height="350px">
                        </div>

                    </li>
                </div>
            </div>
        </div>
    </div>
    </div>
    <a href="{{ route('books.index') }}" class="btn mx-5 btn-danger">
        <i class="las la-undo">Back</i>
    </a>
@endsection
