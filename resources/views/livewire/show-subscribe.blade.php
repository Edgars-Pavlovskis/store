<div class="axil-newsletter-area axil-section-gap pt--0">
    <div class="container" style="background-size: cover; background-image:url('/assets/images/subscribe-bg.jpg')" >
        <div class="etrade-newsletter-wrapper ">
            @if (isset($done))
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2 text-success"><i class="fa-solid fa-check bg-success"></i>{{__('banners.thankyou')}}</span>
                    <h4 class="title mb--40 mb_sm--30">{{__('banners.you-subscibed')}}</h4>
                </div>
            @else
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i> {{__('banners.enter-email')}}</span>
                    <h2 class="title mb--40 mb_sm--30">{{__('banners.subscribe-news')}}</h2>
                    <form wire:submit="subscribe">
                        <div class="input-group newsletter-form">
                            <div class="position-relative newsletter-inner mb--15">
                                <input placeholder="epasts@gmail.com" type="text" wire:model.defer="email">
                            </div>
                            <button type="submit" class="axil-btn mb--15">{{__('banners.subscribe')}}</button>
                        </div>
                    </form>
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            @endif

        </div>
    </div>
</div>
