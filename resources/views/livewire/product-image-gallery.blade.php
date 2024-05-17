<div class="row">
    @if ($linked)
        <div class="col-12">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    @if (isset($linkedProduct->id))
                        <i class="fa-solid fa-link me-2"></i>{{$linkedProduct->title}} <small>{{$linkedProduct->inner_code}}</small>
                    @else
                        <i class="fa-solid fa-link me-2"></i><span class="text-danger">{{__('admin.Linked product not found')}}</span>
                    @endif
                    <button wire:click="unlinkGallery" type="button" class="btn-block-option" data-toggle="block-option" >
                        <i class="si si-close"></i>
                    </button>
                </h3>
            </div>
        </div>
    @else
        <div class="col-12 col-md-4 mx-auto">
            <div class="input-group">
                <input type="email" class="form-control" placeholder="{{__('admin.Product ID')}}" wire:model="linkID">
                <button wire:click="linkGallery" type="button" class="btn btn-dark">{{__('admin.Link gallery')}}</button>
            </div>
        </div>

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
                        resizeWidth: 1300,
                        resizeHeight: 1056,
                        resizeMethod: "contain",
                        queuecomplete: function() {
                            @this.call('$refresh');
                        }
                    };
                </script>

                </div>
            </div>

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
        </div>
    @endif


</div>
