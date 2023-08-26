<!-- Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form action="" enctype="multipart/form-data" class="updateForm" method="POST" id="updateBookForm">
        @csrf
        <input type="hidden" id="update_id" value="">
        <div class="modal-dialog text-capitalize  justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="updateModalLabel">update Book</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer">

                    </div>
                    <div class="  card p-4">

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" id="update_title"
                                        class="form-control @error('title') is-invalid @enderror" name="update_title"
                                        value="{{ old('title') }}" placeholder="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">auther</label>
                                    <input type="text" id="update_auther"
                                        class="form-control @error('auther') is-invalid @enderror" name="update_auther"
                                        value="{{ old('auther') }}" placeholder="auther">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">page_count</label>
                                    <input type="number" id="update_pageCount"
                                        class="form-control @error('page_count') is-invalid @enderror" name="update_page_count"
                                        value="{{ old('page_count') }}" placeholder="page_count">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">lang</label>
                                    <input type="text" class="form-control @error('lang') is-invalid @enderror"
                                        name="update_lang" id="update_lang" value="{{ old('lang') }}" placeholder="lang">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">size</label>
                                    <input type="text" id="update_size"
                                        class="form-control @error('size') is-invalid @enderror"name="update_size"
                                        value="{{ old('size') }}" placeholder="size">
                                </div>
                            </div>

                            {{-- <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Upload Pdf</label>
                                    <input type="file" id="update_file"
                                        class="form-control @error('file') is-invalid @enderror" name="update_file"
                                        value="{{ old('file') }}">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary update_book">update Book</button>
                </div>
            </div>
        </div>
    </form>

</div>
