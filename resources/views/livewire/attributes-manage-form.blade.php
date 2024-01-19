<div class="col-lg-8 col-xl-5">


        <div class="block block-rounded">
            <div class="mb-4">
                <label class="form-label">{{__('admin.attributes.input-type')}}</label>
                <div class="space-x-2">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="example-radios-inline1" name="type" value="value" {{ (old('type', $attribute->type) == null || old('type', $attribute->type) == 'value') ? 'checked' : '' }} >
                    <label class="form-check-label" for="example-radios-inline1">{{__('admin.attributes.input-type-value')}}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="example-radios-inline2" name="type" value="list" {{ (old('type', $attribute->type) == 'list') ? 'checked' : '' }} >
                    <label class="form-check-label" for="example-radios-inline2">{{__('admin.attributes.input-type-list')}}</label>
                </div>
                </div>
            </div>
        </div>


        <div class="block block-rounded">
            <ul class="nav nav-tabs nav-tabs-alt justify-content-end" role="tablist">
                @foreach (getLocales() as $lang)
                    <li class="nav-item" role="presentation">
                        <button type="button" class="nav-link @if($loop->index == 0) active @endif" id="attributes-title-tab-{{$lang}}" data-bs-toggle="tab" data-bs-target="#attributes-title-content-{{$lang}}" role="tab" aria-controls="attributes-title-content-{{$lang}}" aria-selected="true">{{strtoupper($lang)}}</button>
                    </li>
                @endforeach
            </ul>
            <div class="block-content tab-content">
                @foreach (getLocales() as $lang)
                    <div class="tab-pane @if($loop->index == 0) active @endif" id="attributes-title-content-{{$lang}}" role="tabpanel" aria-labelledby="attributes-title-tab-{{$lang}}" tabindex="0">

                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="name-txt-{{$lang}}" name="name[{{$lang}}]" placeholder="{{__('admin.attributes.input-name')}}" value="{{ old('name.'.$lang, $name[$lang] ?? '') }}">
                            <label for="name-txt-{{$lang}}">{{__('admin.attributes.input-name')}} [{{$lang}}]</label>
                        </div>

                        <div style="padding: 10px; background-color: rgba(100,100,100,0.03); border: 1px solid rgba(50,50,50,0.05); border-radius:5px;">
                            <label class="mb-2">{{__('admin.attributes.input-values')}} [{{$lang}}]</label>
                            @foreach ($options[$lang] ?? [] as $key => $value)
                                <div class="mb-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm form-control-alt" name="options[{{$lang}}][{{$key}}]" value="{{ old('options.'.$lang.'.'.$key, $value) }}">
                                        <button type="button" class="btn btn-dark" wire:click="deleteOption('{{$key}}')">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach

                <button type="button" wire:click="addOption" class="btn btn-sm btn-success mt-2 ">
                    <i class="fa-solid fa-plus me-1"></i> {{__('admin.attributes.add-value')}}
                </button>

            </div>
        </div>



        <div class="block-content tab-content" style="text-align:center;">
            <button type="submit" class="btn  btn-primary me-1 mb-3">
                <i class="fa fa-fw fa-check me-1"></i> {{__('admin.create')}}
            </button>
        </div>



</div>
