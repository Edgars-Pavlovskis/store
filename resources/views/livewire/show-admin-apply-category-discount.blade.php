<div class="d-inline">

    <button type="button" class="btn btn-sm btn-outline-info me-1 mb-3 p-0 ms-3"><input class="d-inline form-control form-control-sm text-center" style="width:50px; font-size:95%;" type="text" placeholder="%" wire:model.blur="discount"></button>

    <button type="button" class="btn btn-sm btn-alt-success me-1 mb-3 dropdown-toggle" id="dropdown-default-alt-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('admin.apply-category-discount')}}
    </button>
    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-alt-info">
        <a class="dropdown-item" wire:click="applyDiscount" href="javascript:void(0)">{{__('admin.confirm')}}</a>
    </div>

    <button type="button" class="btn btn-sm btn-alt-secondary me-1 mb-3 dropdown-toggle" id="dropdown-default-alt-info" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('admin.remove-category-discount')}}
    </button>
    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-alt-info">
        <a class="dropdown-item" wire:click="removeDiscount" href="javascript:void(0)">{{__('admin.confirm')}}</a>
    </div>

</div>
