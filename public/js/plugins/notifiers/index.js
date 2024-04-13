document.addEventListener('showSuccess', event => {
    One.helpers('jq-notify', {type: 'success', icon: 'fa fa-check me-1', message: event.__livewire.params[0].message});
})

document.addEventListener('showNotify', event => {
    One.helpers('jq-notify', {type: 'info', icon: 'fa fa-info-circle me-1', message: event.__livewire.params[0].message});
})



