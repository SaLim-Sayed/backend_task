<script>
    $(document).ready(function() {
        $(document).on('click', '.add_book', function(e) {
            e.preventDefault();
            var formData = new FormData($('.addForm')[0]);
            $.ajax({
                url: "{{ route('books.addBook') }}",
                type: 'post',
                enctype: 'multipart/form-data',
                data: formData,
                method: "post",
                contentType: false,
                cache: false,
                processData: false,

                success: function(res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#addBookForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                    }
                },
                error: function(err) {
                    var error = err.responseJSON;
                    $.each(error.errors, function(key, val) {
                        $('.errMsgContainer').append('<li class="text-danger">' +
                            val + '</li>');
                    });
                }
            });
        })

        //////show update model

        $(document).on('click', '.update_book_form', function(e) {
            e.preventDefault();
            // var formData = new FormData($('.updateForm')[0]);
            let id = $(this).data('id');
            let title = $(this).data('title');
            let auther = $(this).data('auther');
            let size = $(this).data('size');
            let page_count = $(this).data('page_count');
            let lang = $(this).data('lang');
            // let file = $(this).data('file');


            $('#update_id').val(id);
            $('#update_title').val(title);
            $('#update_auther').val(auther);
            $('#update_size').val(size);
            $('#update_pageCount').val(page_count);
            $('#update_lang').val(lang);
            // $('#update_file').val(file);

        })

        //update
        $(document).on('click', '.update_book', function(e) {
            e.preventDefault();
            // var formDataUpdate = new FormData($('.updateForm')[0]);
            let update_id = $('#update_id').val();
            let update_title = $('#update_title').val();
            let update_auther = $('#update_auther').val();
            let update_size = $('#update_size').val();
            let update_pageCount = $('#update_pageCount').val();
            let update_lang = $('#update_lang').val();
            //   let update_file=  $('#update_file').val();
            $.ajax({
                url: "{{ route('books.updateBook') }}",
                method: "post",
                enctype: 'multipart/form-data',

                data: {
                    update_id: update_id,
                    update_title: update_title,
                    update_auther: update_auther,
                    update_size: update_size,
                    update_page_count: update_pageCount,
                    update_lang: update_lang,
                    // update_file:update_file,
                },

                success: function(res) {
                    if (res.status == 'success') {
                        $('#updateModal').modal('hide');
                        $('#updateBookForm')[0].reset();
                        $('.table').load(location.href + ' .table');

                    }
                },
                error: function(err) {
                    var error = err.responseJSON;
                    $.each(error.errors, function(key, val) {
                        $('.errMsgContainer').append('<li class="text-danger">' +
                            val + '</li>');
                    });
                }
            });
        })

        //delete
        $(document).on('click', '.delete_book', function(e) {
            e.preventDefault();

            let book_id = $(this).data('id');

            if (confirm('Are you sure you want to delete')) {
                $.ajax({
                    url: "{{ route('books.deleteBook') }}",
                    method: "post",
                    data: {
                        book_id: book_id
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');
                        }
                    }
                });
            }

        })

        //search

        $('#keyword').keyup(function() {
            let keyword = $(this).val()

            let url = "{{ route('book.search') }}" + "?keyword=" + keyword

            console.log(url)
            $.ajax({
                type: "GET",
                url: url,
                contentType: false,
                processData: false,

                success: function(data) {
                    console.log(data)
                    $('#allBooks').empty()
                    for (book of data) {

                        $('#allBooks').append(`
                        <div class="col col-xl-3 col-lg-4 col-md-6 col-sm-12  col-12 my-3">
                            <div class="card">
                                 <div class="card-header osition-relative">
                                <img src="{{ asset('uploads/books/${book.img}') }}" width="200" height="200"/>
                                </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">${book.title }</h5>
                                <p class="card-text text-danger">${book.auther } </p>

                            </div>
                            <div class="card-body">
                                <a href="{{ url('book/show/${book.id}') }} " class="btn btn-info fs-5">
                                    <i class="las la-info"></i>
                                </a>
                                <a href="" class=" btn btn-success fs-5 update_book_form" data-bs-toggle="modal"
                                    data-bs-target="#updateModal" data-id="${book.id }"
                                    data-title="${book.title }" data-auther="${book.auther }"
                                    data-lang="${book.lang }" data-size="${book.size }"
                                    data-page_count="${book.page_count }" data-file="${book.file }">
                                    <i class="las la-edit"></i>
                                </a>
                                <a class=" btn btn-danger fs-5 delete_book " data-id="${book.id }" href="">
                                    <i class="las la-trash"></i>
                                </a>
                                <a class=" btn btn-warning fs-5  " data-id="${book.id }"
                                href="{{ asset('uploads/books/${book.file}') }}" target="_blank">
                                    <i class="las la-file-pdf"></i>
                                </a>


                            </div>
                            </div>
                         </div>
                        `)
                    }
                }


            })
        })
    })
</script> {{-- <p class="card-text text-danger">Page_Count : ${ book.page_count}</p>
// <p class="card-text text-danger">Lang : ${ book.lang}</p>
// <p class="card-text text-danger">Book_size : ${ book.size}</p>--}}

