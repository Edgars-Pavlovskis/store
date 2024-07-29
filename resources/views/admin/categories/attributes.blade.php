@extends('layouts.backend')



@section('css')

  <style>
    .blue-sortable-class a {
        border: 1px solid rgba(13, 65, 102, 0.45);
    }
  </style>
@endsection

@section('js_end')
  <!-- jQuery (required for DataTables plugin) -->
  <script src="{{ asset('js/lib/jquery.min.js') }}"></script>

  <script src="{{ asset('js/plugins/sorting/Sortable.min.js') }}"></script>




  <script>
    $( document ).ready(function() {
        var el = document.getElementById('sortable-attributes');
        var sortable = Sortable.create(el,{
            animation: 150,
            ghostClass: 'blue-sortable-class',
            easing: "cubic-bezier(1, 0, 0, 1)",
            onUpdate: function (/**Event*/evt) {
                var newOrder = Array.from(evt.from.children).map(function (item, index) {
                    // Update the order attribute on the element
                    item.setAttribute('data-order', index + 1);
                    return {
                        id: item.getAttribute('attrID'), // Assuming you have a data-id attribute
                        order: index + 1,
                    };
                });
                $.ajax({ url: '{{ route("attributes-update-sorting") }}', type: 'POST', data: { "_token": "{{ csrf_token() }}", order: newOrder } });
            },
        });

        document.querySelector('.inner-button').addEventListener('click', function(event) {
            event.stopPropagation();
            event.preventDefault();
        });
    });
  </script>
  <!-- Page JS  Code -->

@endsection

@section('content')

  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-1">
            {{__('admin.attributes.show')}}
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            {{__('admin.attributes.group')}}: <b>@if (isset($current)) {{$current->title}} @else {{__('admin.attributes.maingroup')}} @endif</b>
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/admin/categories/show/">{{__('admin.categories.title')}}</a>
            </li>
            @if (isset($current->id))
                <li class="breadcrumb-item" aria-current="page">
                    <a class="link-fx" href="/admin/categories/show/{{isset($current->alias)?$current->alias:''}}">{{$current->title}}</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    {{__('admin.attributes.show')}}
                </li>

            @else
                <li class="breadcrumb-item" aria-current="page">
                    {{__('admin.attributes.show')}}
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    {{__('admin.attributes.maingroup')}}
                </li>
            @endif

          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->



  <!-- Page Content -->
  <div class="content">

    <a href="/admin/categories/show/{{isset($current->alias)?$current->alias:''}}">
        <button type="button" class="btn btn-alt-secondary me-1 mb-3">
            <i class="fa-solid fa-caret-left me-1"></i> {{__('admin.goback')}}
        </button>
    </a>

    <a href="/admin/categories/attributes/manage/{{isset($current->alias)?$current->alias:'root'}}">
        <button type="button" class="btn btn-alt-success me-1 mb-3">
            <i class="fa fa-fw fa-plus me-1"></i> {{__('admin.attributes.add')}}
        </button>
    </a>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">
            {{__('admin.attributes.list')}} <small>{{__('admin.attributes.in-choosed-category')}}</small>
            </h3>
        </div>
    </div>

    <div id="sortable-attributes" class="row">
        @foreach ($attributes as $attribute)
            <div class="col-md-6 col-xl-3" attrID="{{$attribute->id}}">
                <div class="block block-rounded block-link-shadow" href="{{ route('attributes-manage', ['alias'=>$attribute->group ?? 'root', 'id'=>$attribute->id]) }}">
                    <div class="block-content block-content-full d-flex flex-row-reverse align-items-center justify-content-between">
                        <img class="img-avatar img-avatar48" src="/assets/images/icons/attribute.png" alt="">
                        <div class="me-3">
                            <p class="fw-semibold mb-0">
                                {{$attribute->name}}
                                <span class="fs-sm fw-medium text-muted mb-0">
                                    ({{__('admin.attributes.input-type-'.$attribute->type)}})
                                </span>
                            </p>
                            <p class="fs-sm fw-medium text-muted mb-0">
                                <a href="{{ route('attributes-manage', ['alias'=>$attribute->group ?? 'root', 'id'=>$attribute->id]) }}" class="text-info"><i class="fa-solid fa-pen-to-square"></i> {{__('admin.attributes.edit')}}</a>
                                &nbsp;|&nbsp;
                                <a href="javascript:void(0);" onclick="Livewire.dispatch('confirmDeleteExternal', { itemId: '{{$attribute->id}}', itemName: '{{$attribute->name}}', model: 'Attributes', parent: '{{$attribute->group}}' })" class="text-danger"><i class="fa-solid fa-trash"></i> {{__('admin.attributes.delete')}}</a>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


  </div>
  <!-- END Page Content -->
  @livewire('delete-confirmation')

@endsection
