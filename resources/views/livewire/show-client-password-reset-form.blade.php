<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label>{{__('frontend.profile.name')}} @if($nameUpdated) <i class="fa-regular fa-circle-check text-success"></i> @endif </label>
            <input type="text" class="form-control" wire:model.change="name">
            @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
        </div>
    </div>


    <div class="col-12">
        <div class="axil-checkout-notice mb-2">
            <div class="axil-toggle-box">
                <div class="toggle-bar "><i class="fa-regular fa-id-card"></i> @if ($companyUpdated) <i class="fa-regular fa-circle-check text-success"></i> @endif <a href="javascript:void(0)" class="toggle-btn">{{__('frontend.profile.jurinfo.title')}} <i class="fas fa-angle-down"></i></a></div>
                <div class="toggle-open">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.profile.jurinfo.name')}}</label>
                                <input type="text" wire:model.defer="companyname">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.profile.jurinfo.regno')}}</label>
                                <input type="text" wire:model.defer="companyregno">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.profile.jurinfo.bank')}}</label>
                                <input type="text" wire:model.defer="companybank">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.profile.jurinfo.account')}}</label>
                                <input type="text" wire:model.defer="companyaccount">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb--0">
                                <div class="login-btn">
                                    <a wire:click="updateJurinfo" href="javascript:void(0)" class="axil-btn btn-bg-primary py-3 px-4">{{__('frontend.Update data')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="col-12">
        <div class="axil-checkout-notice mb-2">
            <div class="axil-toggle-box">
                <div class="toggle-bar "><i class="fa-solid fa-file-invoice-dollar"></i> @if ($invoiceAddressUpdated) <i class="fa-regular fa-circle-check text-success"></i> @endif <a href="javascript:void(0)" class="toggle-btn">{{__('frontend.profile.invoiceaddress.title')}} <i class="fas fa-angle-down"></i></a></div>
                <div class="toggle-open">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.name')}} </label>
                                <input type="text" wire:model.defer="invoiceName">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.surname')}} </label>
                                <input type="text" wire:model.defer="invoiceSurname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('frontend.checkout.street')}} </label>
                        <input type="text" id="address1" class="mb--15" wire:model.defer="invoiceStreet" placeholder="Ielas nosaukums un mājas / dzīvokļa numurs">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.city')}} </label>
                                <input type="text" wire:model.defer="invoiceCity">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.zip')}} </label>
                                <input type="text" wire:model.defer="invoiceZip">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('frontend.checkout.country')}} </label>
                        <input type="text" wire:model.defer="invoiceCountry">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.phone')}} </label>
                                <input type="text" wire:model.defer="invoicePhone">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.email')}} </label>
                                <input type="text" wire:model.defer="invoiceEmail">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb--0">
                                <div class="login-btn">
                                    <a wire:click="updateInvoiceAddress" href="javascript:void(0)" class="axil-btn btn-bg-primary py-3 px-4">{{__('frontend.Update data')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-12">
        <div class="axil-checkout-notice mb-2">
            <div class="axil-toggle-box">
                <div class="toggle-bar "><i class="fa-solid fa-file-invoice-dollar"></i> @if ($deliveryAddressUpdated) <i class="fa-regular fa-circle-check text-success"></i> @endif <a href="javascript:void(0)" class="toggle-btn">{{__('frontend.profile.deliveryaddress.title')}} <i class="fas fa-angle-down"></i></a></div>
                <div class="toggle-open">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.name')}} </label>
                                <input type="text" wire:model.defer="deliveryName">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.surname')}} </label>
                                <input type="text" wire:model.defer="deliverySurname">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('frontend.checkout.street')}} </label>
                        <input type="text" id="address1" class="mb--15" wire:model.defer="deliveryStreet" placeholder="Ielas nosaukums un mājas / dzīvokļa numurs">
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.city')}} </label>
                                <input type="text" wire:model.defer="deliveryCity">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>{{__('frontend.checkout.zip')}} </label>
                                <input type="text" wire:model.defer="deliveryZip">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{__('frontend.checkout.country')}} </label>
                        <input type="text" wire:model.defer="deliveryCountry">
                    </div>

                    <div class="form-group">
                        <label>{{__('frontend.checkout.phone')}} </label>
                        <input type="text" wire:model.defer="deliveryPhone">
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group mb--0">
                                <div class="login-btn">
                                    <a wire:click="updateDeliveryAddress" href="javascript:void(0)" class="axil-btn btn-bg-primary py-3 px-4">{{__('frontend.Update data')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr><hr>


    <div class="col-12">
        <h5 class="title">{{__('frontend.profile.password-change')}} @if($passwordChanged) <i class="fa-regular fa-circle-check text-success"></i> @endif</h5>
        @if ($passwordChanged)
            <div class="alert alert-success" role="alert">{{__('frontend.profile.password-changed')}}</div>
        @else
            <div class="form-group">
                <label>{{__('frontend.profile.current-password')}}</label>
                <input type="password" class="form-control" wire:model.defer="current_password">
                @error('current_password') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
            </div>
            <div class="form-group">
                <label>{{__('frontend.profile.new-password')}}</label>
                <input type="password" class="form-control" wire:model.defer="new_password">
                @error('new_password') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
            </div>
            <div class="form-group">
                <label>{{__('frontend.profile.confirm-password')}}</label>
                <input type="password" class="form-control" wire:model.defer="new_password_confirmation">
            </div>
            <div class="form-group mb--0">
                <div class="login-btn">
                    <a wire:click="resetPassword" href="javascript:void(0)" class="axil-btn btn-bg-primary py-3 px-4">{{__('frontend.profile.change-password')}}</a>
                </div>
            </div>
        @endif
    </div>
</div>
