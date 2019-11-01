<div class="container-fluid mb-3">

    @error('title')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    @error('imageFile')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    <div class="card image-form">
        <div class="card-body">
            <form method="POST" action="{{ route('photos.store') }}" enctype="multipart/form-data" class="mb-0">
                <input type="hidden" name="_token" value = "{{ csrf_token() }}">
                <div class="form-row">
                    <div class="col-md-5 mb-2">
                        <input type="text" class="form-control" name="title" placeholder="Image Title">
                    </div>
                    <div class="col-md-5 mb-2">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name = "imageFile" id="imageFile"  accept="image/jpg,image/png,image/gif,image/jpeg" >
                            <label class="custom-file-label" for="imageFile">Choose file</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-block">Uplaod Image</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>