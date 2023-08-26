<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <form action="" enctype="multipart/form-data" class="addForm"  method="POST" id="addBookForm">
        @csrf
        <div class="modal-dialog text-capitalize  justify-content-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="addModalLabel">Add Book</h1>
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
                                    <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" placeholder="title">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">auther</label>
                                    <input type="text" id="auther" class="form-control @error('auther') is-invalid @enderror"
                                        name="auther" value="{{ old('auther') }}" placeholder="auther">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">page_count</label>
                                    <input type="number" id="pageCount" class="form-control @error('page_count') is-invalid @enderror"
                                        name="page_count" value="{{ old('page_count') }}" placeholder="page_count">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">lang</label>
                                    <input type="text" class="form-control @error('lang') is-invalid @enderror"
                                        name="lang" id="lang" value="{{ old('lang') }}" placeholder="lang">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">size</label>
                                    <input type="text" id="size"
                                        class="form-control @error('size') is-invalid @enderror"name="size"
                                        value="{{ old('size') }}" placeholder="size">
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Upload Pdf</label>
                                    <input type="file"  id="file" class="form-control @error('file') is-invalid @enderror"
                                        name="file" value="{{ old('file') }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label class="form-label">Cover Image</label>
                                    <input type="file"  id="img" class="form-control @error('img') is-invalid @enderror"
                                        name="img" value="{{ old('img') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary add_book">Save Book</button>
                </div>
            </div>
        </div>
    </form>

</div>
