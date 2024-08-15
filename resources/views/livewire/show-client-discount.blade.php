<div class="row">

    @foreach (config('discounts.list') as $index => $discount)
        <div class="col">
            <a class="block block-rounded block-link-shadow text-center" href="javascript:void(0)" wire:click="changeStatus({{$index}})">
            <div class="block-content block-content-full">
                <div class="item item-circle
                    @if($client->discount == $index) bg-primary-lighter @else bg-body @endif
                    mx-auto">
                    <i class="
                        @if($client->discount == $index) fa-solid fa-star-of-life fa-spin text-primary @else fa fa-times text-muted @endif
                    "></i>
                </div>
            </div>
            <div class="block-content py-2 bg-body-light">
                <p class="fw-medium fs-sm
                    @if($client->discount == $index) text-primary @else text-muted @endif
                    mb-0">
                    {{config('discounts.list.' . $index . '.title.'.App()->currentLocale(), 'notitle')}}
                </p>
            </div>
            </a>
        </div>
    @endforeach


</div>
