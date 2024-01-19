<div class="row">
    <div class="col-12">
        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-content fs-sm text-muted">
            <form method="post" class="dropzone dz-clickable mb-3" id="my-gallery-dropzone" action="{{ route('productGalleryUpload', ["id" => $id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="dz-default dz-message">
                    <button class="dz-button" type="button">{{__('admin.products.gallery.droptoupload')}}</button>
                </div>



            </form>

            <script>
                Dropzone.options.myGalleryDropzone = {
                    maxFilesize: 10,
                    acceptedFiles: '.jpg',
                    resizeWidth: 800,
                    resizeHeight: 650,
                    resizeMethod: "contain",
                    queuecomplete: function() {
                        @this.call('$refresh');
                    }
                };
            </script>

            </div>
        </div>
        <!-- END Info -->


        <!-- Info -->
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{__('admin.products.gallery.title')}}</h3>
            </div>
            <div class="block-content fs-sm text-muted mb-4">
                <div class="row items-push">
                        @if (empty($galleryImages))
                            <h2 class="fs-base lh-base fw-medium text-muted mt-0 pt-0">
                                <i>{{__('admin.products.gallery.empty')}}</i>
                            </h2>
                        @else
                            @foreach($galleryImages as $path)
                                <div class="col-md-4 col-lg-2 animated fadeIn">
                                    <div class="options-container preview-holder" style="background-image:url('{{ $path }}');">
                                        <a class="btn btn-sm btn-alt-secondary" href="javascript:void(0)" wire:click="removeGallery('{{$path}}')"><i class="fa fa-times text-danger"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                </div>
            </div>

        </div>
        <!-- END Info -->


    </div>

</div>
