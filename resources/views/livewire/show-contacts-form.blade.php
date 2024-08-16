<div class="contact-form p-4" style="position: relative;">
    <style>
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            z-index: 10;
            border-radius: 8px;
        }
    </style>

    <h3 class="title mb--10">{{__('frontend.contacts.header')}}</h3>
    <p>{{__('frontend.contacts.text')}}</p>
    <form id="contact-form" action="" class="axil-contact-form">
        <div class="row row--10">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="contact-name">{{__('frontend.contacts.name')}} <span>*</span></label>
                    <input type="text" wire:model.blur="name" id="contact-name">
                    @error('name') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="contact-phone">{{__('frontend.contacts.phone')}}</label>
                    <input type="text" wire:model.blur="phone" id="contact-phone">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="contact-email">{{__('frontend.contacts.email')}} <span>*</span></label>
                    <input type="email" wire:model.blur="email" id="contact-email">
                    @error('email') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="contact-message">{{__('frontend.contacts.message')}} <span>*</span></label>
                    <textarea wire:model.blur="message" id="contact-message" cols="1" rows="2"></textarea>
                    @error('message') <span class="text-danger"><small>{{ $message }}</small></span> @enderror
                </div>
            </div>
            <div class="col-12 text-center">
                <div class="form-group mb--0 text-center">
                    <button wire:click="submitForm" type="button" id="submit" class="axil-btn btn-bg-primary">{{__('frontend.contacts.send')}}</button>
                </div>
            </div>


        </div>

    </form>
    @if ($messageSent)
        <div class="overlay">
            <i class="fa-regular fa-circle-check me-3"></i> {{__('frontend.contacts.messagesent')}}
        </div>
    @endif

</div>
