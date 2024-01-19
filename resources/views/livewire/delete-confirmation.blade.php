<div>
    <link rel="stylesheet" href="{{ asset('js/plugins/sweetalert2/sweetalert2.min.css') }}">
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body pb-1">
                    <div class="swal2-icon swal2-warning swal2-icon-show mt-3" style="display: flex;"><div class="swal2-icon-content">!</div></div>
                    <h3 class="swal2-title text-center mb-2">{{__('admin.dialogs.confirm-delete')}}</h3>
                    <p class="text-center mb-2">{{__('admin.dialogs.confirm-delete-question')}} <b>{{$itemName}}</b>?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-danger px-4" wire:click="deleteItem" data-bs-dismiss="modal">{{__('admin.dialogs.delete')}}</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('admin.dialogs.cancel')}}</button>
                </div>
            </div>
        </div>
    </div>


</div>



