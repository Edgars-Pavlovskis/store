<li class="shopping-cart">
    <a href="#" class="cart-dropdown-btn">
        <span class="cart-count">{{count($shoppingCart)}}</span>
        <i class="flaticon-shopping-cart"></i>
    </a>
</li>

@push('scripts')
<script>
    window.addEventListener('CartAddNotify', e => {
        var wrapp = $('body'),
            wrapMask = $('<div / >').addClass('closeMask'),
            cartDropdown = $("#shopping-cart-add-notify-modal");

        if (!(cartDropdown).hasClass('open')) {
            wrapp.addClass('open');
            cartDropdown.addClass('open');
            cartDropdown.parent().append(wrapMask);
            wrapp.css({'overflow': 'hidden'});

            $('.sidebar-close, .closeMask').on('click', function() {
                wrapp.removeAttr('style');
                wrapp.removeClass('open').find('.closeMask').remove();
                cartDropdown.removeClass('open');
            });
        }

    })
</script>
@endpush



