<?php

namespace App\Livewire;
use App\Models\User;

use Livewire\Component;

class ShowClientInfo extends Component
{
    public User $client;
    public $companyname, $companyregno, $companybank, $companyaccount;
    public $invoiceName, $invoiceSurname, $invoiceStreet, $invoiceCity, $invoiceZip, $invoiceCountry, $invoicePhone, $invoiceEmail;
    public $deliveryName, $deliverySurname, $deliveryStreet, $deliveryCity, $deliveryZip, $deliveryCountry, $deliveryPhone;

    public function mount()
    {
        $this->companyname = $this->client->profiledata['companyname'] ?? '';
        $this->companyregno = $this->client->profiledata['companyregno'] ?? '';
        $this->companybank = $this->client->profiledata['companybank'] ?? '';
        $this->companyaccount = $this->client->profiledata['companyaccount'] ?? '';

        $this->invoiceName = $this->client->profiledata['invoiceName'] ?? '';
        $this->invoiceSurname = $this->client->profiledata['invoiceSurname'] ?? '';
        $this->invoiceStreet = $this->client->profiledata['invoiceStreet'] ?? '';
        $this->invoiceCity = $this->client->profiledata['invoiceCity'] ?? '';
        $this->invoiceZip = $this->client->profiledata['invoiceZip'] ?? '';
        $this->invoiceCountry = $this->client->profiledata['invoiceCountry'] ?? '';
        $this->invoicePhone = $this->client->profiledata['invoicePhone'] ?? '';
        $this->invoiceEmail = $this->client->profiledata['invoiceEmail'] ?? '';

        $this->deliveryName = $this->client->profiledata['deliveryName'] ?? '';
        $this->deliverySurname = $this->client->profiledata['deliverySurname'] ?? '';
        $this->deliveryStreet = $this->client->profiledata['deliveryStreet'] ?? '';
        $this->deliveryCity = $this->client->profiledata['deliveryCity'] ?? '';
        $this->deliveryZip = $this->client->profiledata['deliveryZip'] ?? '';
        $this->deliveryCountry = $this->client->profiledata['deliveryCountry'] ?? '';
        $this->deliveryPhone = $this->client->profiledata['deliveryPhone'] ?? '';
    }

    public function render()
    {
        return view('livewire.show-client-info');
    }
}
