


@if (isset($category->image) && strlen($category->image) > 0)
<div class="row push">
    <div class="block block-rounded mt-3">
        <label class="form-label">Category image</label>
        <div class="bg-image" style="background-image: url('/storage/categories/{{$category->image}}'); background-position: center; background-size: contain; background-repeat: no-repeat;">
            <div class="block-content block-content-full bg-black-10 ribbon ribbon-glass">
                <div class="ribbon-box" style="background-color:transparent;">
                    <button wire:click='deleteImage' type="button" class="btn rounded-pill btn-alt-danger me-1 mb-3">
                        <i class="fa fa-fw fa-times me-1"></i> Delete
                    </button>
                </div>
                <div class="text-center py-6"></div>
            </div>
        </div>
    </div>
@else
<div class="mb-4 mt-4">
    <label class="form-label" for="category-image-file">Category image @error('image')<span style="vertical-align: super;" class="badge bg-warning"><i class="fa fa-exclamation-circle"></i> {{$message}}</span>@enderror</label>
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="category-image-file" name="image">
</div>
@endif
