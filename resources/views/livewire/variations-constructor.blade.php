<div class="block block-rounded">
    <div class="block-header block-header-default">
      <h3 class="block-title">
        {{__('admin.products.variations.title')}}
      </h3>
    </div>
    <div class="block-content block-content-full pt-2">
        <button type="button" class="btn btn-sm rounded-1 btn-success mb-3 px-3" wire:click="addVariation()">
            <i class="fa-solid fa-plus me-2"></i>{{__('admin.add')}}
        </button>

        <button type="button" class="btn btn-sm rounded-1 btn-info mb-3 px-3" wire:click="saveVariations()">
            <i class="fa-regular fa-floppy-disk me-2"></i>{{__('admin.save')}}
        </button>

        <form wire:submit.prevent="saveVariations">
            <div class="row">
                @foreach ($variations as $key => $variation)
                    <div class="col-md-6 col-xl-3">
                        <div class="card push">
                        <div class="card-header border-bottom-0 p-1 ">
                            <h3 class="block-title variations-header">
                                <input type="text" class="form-control bg-dark bg-gradient text-light form-control-sm" id="example-text-input-sm-alt" placeholder="{{__('admin.products.variations.name')}}" wire:model.defer="variations.{{ $key }}.name">
                            </h3>
                        </div>
                        <div class="card-body p-2">

                            @foreach ($attributesData as $attribute)
                                @if ($attribute->type == "value")
                                    <div class="mb-2">
                                        <label class="form-label" for="attr-{{$key}}-{{$attribute->id}}"><small>{{$attribute->name}}</small></label>
                                        <input type="text" class="form-control form-control-sm" id="attr-{{$key}}-{{$attribute->id}}" wire:model.defer="variations.{{ $key }}.variations.{{$attribute->id}}">
                                    </div>
                                @else
                                    <div class="mb-2">
                                        <label class="form-label" for="val-skill"><small>{{$attribute->name}}</small></label>
                                        <select class="form-select" id="val-skill" name="val-skill" style="font-size:0.9rem;" wire:model.defer="variations.{{ $key }}.variations.{{$attribute->id}}">
                                            <option value="">{{__('admin.select-value')}}</option>
                                            @foreach ($attribute->options as $attrID => $value)
                                                <option value="{{$attrID}}">{{$value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            @endforeach




                        </div>
                        <div class="card-footer fs-sm border-top-0  px-2" >

                            <div class="row mb-2">
                                <div class="col-6 ">
                                    <div class="input-group">
                                        <span class="input-group-text justify-content-center" style="min-width: 50px;"><i class="fa-solid fa-euro-sign"></i></span>
                                        <input type="text" class="form-control form-control-sm" id="example-group2-input1" name="example-group2-input1" placeholder="0.00" wire:model.defer="variations.{{ $key }}.price">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="input-group">
                                        <span class="input-group-text justify-content-center"  style="min-width: 50px;"><i class="fa-solid fa-cubes"></i></span>
                                        <input type="text" class="form-control form-control-sm" id="example-group2-input1" name="example-group2-input1" placeholder="0" wire:model.defer="variations.{{ $key }}.stock">
                                    </div>
                                </div>




                            </div>


                            <hr>

                            <div class="input-group justify-content-center">

                                <div class="dropdown">
                                    <button type="button" class="btn btn-sm btn-outline-danger rounded-1  dropdown-toggle" id="dropdown-default-outline-danger" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-regular fa-trash-can me-2"></i>{{__('admin.delete')}}
                                    </button>
                                    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-outline-danger" style="">
                                        <a class="dropdown-item" href="javascript:void(0)" wire:click="deleteVariation('{{$key}}')">{{__('admin.delete-confirm')}}</a>
                                    </div>
                                </div>
                            </div>





                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </form>

    </div>



  </div>
