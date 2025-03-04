<div>

    <a href="{{ route('discounts-show') }}">
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
          <h3 class="block-title">{{__('admin.discounts.data')}}</h3>
        </div>
        <div class="block-content block-content-full">
          <form wire:submit.prevent="saveDiscount" method="POST" enctype="multipart/form-data" >

            <div class="row">
              <div class="col-lg-4">
                <p class="fs-sm text-muted">
                    {{__('admin.discounts.input-maindata')}}
                </p>
              </div>
              <div class="col-lg-8 col-xl-5">

                <div class="block block-rounded">

                    <div class="mb-4">
                        <label class="form-label" for="input-string-title">{{__('discounts.title')}}</label>
                        <input type="text" class="form-control form-control-sm" id="input-string-title" wire:model.defer="title">
                    </div>

                    <div class="row mb-4">
                        <div class="col-6">
                            <label class="form-label" for="input-date-end">{{__('discounts.date-start')}}</label>
                            <input type="text" class="js-flatpickr form-control form-control-sm flatpickr-input" id="input-date-end" value="{{$datestart}}" wire:model.defer="datestart" placeholder="{{__('discounts.open-calendar')}}" data-date-format="d-m-Y" readonly="readonly">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="input-date-end">{{__('discounts.date-end')}}</label>
                            <input type="text" class="js-flatpickr form-control form-control-sm flatpickr-input" id="input-date-end" value="{{$dateend}}" wire:model.defer="dateend" placeholder="{{__('discounts.open-calendar')}}" data-date-format="d-m-Y" readonly="readonly">
                        </div>
                    </div>



                    <div class="row mb-4">
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox" value="1" id="active-checkbox" wire:model.defer="active" {{ $active == 0 ? '' : 'checked' }} >
                            <label class="form-check-label" for="active-checkbox">{{__('discounts.active')}}?</label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label" for="input-string-code">{{__('discounts.code-for-coupons')}}</label>
                        <input type="text" class="form-control form-control-sm" id="input-string-code" wire:model.defer="code">
                    </div>
                    <hr>

                    @foreach (config('shop.discounts.templates.'.$type.'.params') as $name => $param)
                        @if ($param['type'] == 'select')
                            <div class="mb-4">
                                <label class="form-label">{{__('discounts.'.$name)}}</label>
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
                                <label class="form-label" for="input-string-{{$name}}">{{__('discounts.'.$name)}}</label>
                                <input type="text" class="form-control form-control-sm" id="input-string-{{$name}}" wire:model.defer="data.{{$name}}">
                            </div>
                        @endif

                        @if ($param['type'] == 'number')
                            <div class="mb-4">
                                <label class="form-label" for="input-string-{{$name}}">{{__('discounts.'.$name)}}</label>
                                <input type="text" class="form-control form-control-sm" id="input-number-{{$name}}" wire:model.defer="data.{{$name}}">
                            </div>

                            <script>
                                document.getElementById('input-number-{{$name}}').addEventListener('input', function (e) {
                                  this.value = this.value.replace(/[^0-9]/g, ''); // Allows only digits
                                });
                            </script>
                        @endif


                        @if ($param['type'] == 'category')
                        <label class="form-label" for="input-string-{{$name}}">{{__('discounts.'.$name)}}</label>
                            <div class="form-floating mb-4" wire:ignore>
                                <select multiple="true" class="js-select2 js-categorySelect-{{$name}} form-select"  style="width: 100%;" data-placeholder="{{__('admin.discounts.input-category')}}">
                                <option></option>
                                    @foreach ($categories as $category)
                                        <option @if(in_array($category->alias, $data[$name]??[])) selected @endif value="{{$category->alias}}">{{$category->title}} ({{$category->alias}}) </option>
                                    @endforeach
                                </select>

                                <script>
                                    // Initialize Select2
                                    document.addEventListener('DOMContentLoaded', function () {
                                        jQuery('.js-categorySelect-{{$name}}').on('change', function (e) {
                                            let selectedValue = jQuery(this).val();
                                            @this.set('data.{{$name}}', selectedValue);
                                        });
                                    });
                                </script>


                            </div>

                        @endif


                        @if ($param['type'] == 'date')
                            <div class="row mb-4">
                                <div class="col-12">
                                <label class="form-label" for="input-date-{{$name}}">{{__('discounts.'.$name)}}</label>
                                <input type="text" class="js-flatpickr form-control form-control-sm" id="input-date-{{$name}}" wire:model.defer="data.{{$name}}" placeholder="d-m-Y" data-date-format="d-m-Y" readonly="readonly">
                                </div>
                            </div>
                        @endif

                    @endforeach

                </div>


                <div class="block-content tab-content" style="text-align:center;">
                    <button type="submit" class="btn  btn-primary me-1 mb-3">
                        <i class="fa fa-fw fa-check me-1"></i> @if(request()->route()->getName() == "discounts-edit"){{__('admin.save')}}@else{{__('admin.add')}}@endif
                    </button>
                </div>

              </div>
            </div>
          </form>



        </div>
    </div>
    <!-- END Your Block -->



</div>
