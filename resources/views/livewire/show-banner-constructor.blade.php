<div>


    <a href="{{ route('banners-show') }}">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> {{__('admin.goback')}}
        </button>
    </a>

    <style>
        select:hover option:hover {
            background-color: transparent !important; /* Remove hover background color */
        }
    </style>

    <!-- Your Block -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
          <h3 class="block-title">{{__('admin.products.data')}}</h3>
        </div>
        <div class="block-content block-content-full">
          <form wire:submit="saveBanner" enctype="multipart/form-data" >

            <div class="row">
              <div class="col-lg-4">
                <p class="fs-sm text-muted">
                    {{__('admin.products.input-maindata')}}
                </p>
              </div>
              <div class="col-lg-8 col-xl-5">

                <div class="block block-rounded">

                    <div class="mb-4">
                        <label class="form-label" for="input-string-title">{{__('banners.title')}}</label>
                        <input type="text" class="form-control form-control-sm" id="input-string-title" wire:model.defer="title">
                    </div>


                    @foreach (config('shop.banners.templates.'.$type.'.params') as $name => $param)
                        @if ($param['type'] == 'select')
                            <div class="mb-4">
                                <label class="form-label">{{__('banners.'.$name)}}</label>
                                <div class="space-x-2">
                                    @foreach ($param['list'] as $index => $item)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="select-{{$name}}-{{$index}}" wire:model.defer="data.{{$name}}" value="{{$item}}">
                                            @if (isset($param['special']))
                                                @if ($param['special'] == "icons")
                                                    <label class="form-check-label" for="select-{{$name}}-{{$index}}"><i class="{{$item}} me-2"></i></label>
                                                @endif
                                                @if ($param['special'] == "colors")
                                                    <label class="form-check-label {{$item}}" for="select-{{$name}}-{{$index}}">{{$item}}</label>
                                                @endif
                                            @else
                                                <label class="form-check-label" for="select-{{$name}}-{{$index}}">{{$item}}</label>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($param['type'] == 'string')
                            <div class="mb-4">
                                <label class="form-label" for="input-string-{{$name}}">{{__('banners.'.$name)}}</label>
                                <input type="text" class="form-control form-control-sm" id="input-string-{{$name}}" wire:model.defer="data.{{$name}}">
                            </div>
                        @endif


                        @if ($param['type'] == 'date')
                            <div class="row mb-4">
                                <div class="col-12">
                                <label class="form-label" for="input-date-{{$name}}">{{__('banners.'.$name)}}</label>
                                <input type="text" class="js-flatpickr form-control form-control-sm" id="input-date-{{$name}}" wire:model.defer="data.{{$name}}" placeholder="d-m-Y" data-date-format="d-m-Y" readonly="readonly">
                                </div>
                            </div>
                        @endif



                    @endforeach


                    @if ($hasI18n)
                        <ul class="nav nav-tabs nav-tabs-alt justify-content-end" role="tablist">
                            @foreach (getLocales() as $lang)
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link @if($loop->index == 0) active @endif" id="products-data-tab-{{$lang}}" data-bs-toggle="tab" data-bs-target="#products-data-content-{{$lang}}" role="tab" aria-controls="products-data-content-{{$lang}}" aria-selected="true">{{strtoupper($lang)}}</button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="block-content tab-content">
                            @foreach (getLocales() as $lang)
                                <div class="tab-pane @if($loop->index == 0) active @endif" id="products-data-content-{{$lang}}" role="tabpanel" aria-labelledby="products-data-tab-{{$lang}}" tabindex="0">
                                    @foreach (config('shop.banners.templates.'.$type.'.params') as $name => $param)
                                        @if ($param['type'] == 'i18n')
                                            <div class="mb-1">
                                                <label class="form-label" for="input-string-{{$name}}">{{__('banners.'.$name)}}</label>
                                                <input type="text" class="form-control form-control-sm" id="input-string-{{$name}}-{{$lang}}" wire:model.defer="data.{{$name}}.{{$lang}}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        <hr>
                    @endif





                    @foreach (config('shop.banners.templates.'.$type.'.params') as $name => $param)
                        @if ($param['type'] == 'image')

                            @if(isset($data[$name]) && strlen($data[$name])>0 && file_exists(public_path('/storage/images/'.$data[$name])))
                                <div class="row push">
                                    <div class="block block-rounded mt-3">
                                        <label class="form-label">{{__('admin.products.fileinput-image')}}</label>
                                        <div class="bg-image" style="background-image: url('/storage/images/{{$data[$name]}}'); background-position: center; background-size: contain; background-repeat: no-repeat;">
                                            <div class="block-content block-content-full bg-black-10 ribbon ribbon-glass">
                                                <div class="ribbon-box" style="background-color:transparent;">
                                                    <button wire:click="removeImage('{{$name}}')" type="button" class="btn rounded-pill btn-alt-danger me-1 mb-3">
                                                        <i class="fa fa-fw fa-times me-1"></i> {{__('admin.delete')}}
                                                    </button>
                                                </div>
                                                <div class="text-center py-6"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="block block-rounded">
                                    <label class="form-label">
                                        {{__('banners.'.$name)}}
                                        @if (isset($param['width']) && isset($param['height']))
                                            <small class="text-secondary">({{$param['width']}}px x {{$param['height']}}px)</small>
                                        @endif
                                        @if(isset($data[$name]) && strlen($data[$name])>0) <small>has file</small> @else <small>no file</small> @endif
                                    </label>
                                    <div class="mb-4"
                                        x-data
                                        x-init="
                                            FilePond.registerPlugin(FilePondPluginFileValidateType);
                                            FilePond.registerPlugin(FilePondPluginFileValidateSize);

                                            const pond{{$loop->index}} = FilePond.create($refs['input{{$loop->index}}'], {
                                                labelIdle: '<b>Pārvelciet</b> vai <b>atlasiet</b> ierīcē failu augšupielādei...',
                                                maxFileSize: '20MB',
                                                acceptedFileTypes: ['image/*'],
                                                labelMaxFileSizeExceeded: 'Pievienotā faila izmērs ir pārāk liels.',
                                                labelMaxFileSize: 'Maksimālais faila izmērs ir {filesize}',

                                                server: {
                                                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                        @this.upload('data.{{$name}}', file, load, error, progress)
                                                    },
                                                    revert: (filename, load) => {
                                                        @this.removeUpload('data.{{$name}}', load)
                                                        @this.set('data.{{$name}}', null)
                                                    },
                                                },


                                            });

                                        "
                                        wire:ignore
                                    >
                                        <input class="form-control" type="file" x-ref="input{{$loop->index}}">
                                    </div>
                                </div>
                            @endif



                        @endif
                    @endforeach

                </div>




                <div class="block-content tab-content" style="text-align:center;">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa fa-fw fa-check me-1"></i> {{__('admin.add')}}
                    </button>
                </div>


              </div>
            </div>
          </form>



        </div>
      </div>
    <!-- END Your Block -->


</div>
