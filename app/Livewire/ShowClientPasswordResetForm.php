<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ShowClientPasswordResetForm extends Component
{
    public $current_password, $new_password, $new_password_confirmation;
    public $passwordChanged = false;

    public $name;
    public $nameUpdated = false;

    public $companyname, $companyregno, $companybank, $companyaccount;
    public $companyUpdated = false;

    public $invoiceName, $invoiceSurname, $invoiceStreet, $invoiceCity, $invoiceZip, $invoiceCountry, $invoicePhone, $invoiceEmail;
    public $invoiceAddressUpdated = false;

    public $deliveryName, $deliverySurname, $deliveryStreet, $deliveryCity, $deliveryZip, $deliveryCountry, $deliveryPhone;
    public $deliveryAddressUpdated = false;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;

        $this->companyname = $user->profiledata['companyname'] ?? '';
        $this->companyregno = $user->profiledata['companyregno'] ?? '';
        $this->companybank = $user->profiledata['companybank'] ?? '';
        $this->companyaccount = $user->profiledata['companyaccount'] ?? '';

        $this->invoiceName = $user->profiledata['invoiceName'] ?? '';
        $this->invoiceSurname = $user->profiledata['invoiceSurname'] ?? '';
        $this->invoiceStreet = $user->profiledata['invoiceStreet'] ?? '';
        $this->invoiceCity = $user->profiledata['invoiceCity'] ?? '';
        $this->invoiceZip = $user->profiledata['invoiceZip'] ?? '';
        $this->invoiceCountry = $user->profiledata['invoiceCountry'] ?? '';
        $this->invoicePhone = $user->profiledata['invoicePhone'] ?? '';
        $this->invoiceEmail = $user->profiledata['invoiceEmail'] ?? '';

        $this->deliveryName = $user->profiledata['deliveryName'] ?? '';
        $this->deliverySurname = $user->profiledata['deliverySurname'] ?? '';
        $this->deliveryStreet = $user->profiledata['deliveryStreet'] ?? '';
        $this->deliveryCity = $user->profiledata['deliveryCity'] ?? '';
        $this->deliveryZip = $user->profiledata['deliveryZip'] ?? '';
        $this->deliveryCountry = $user->profiledata['deliveryCountry'] ?? '';
        $this->deliveryPhone = $user->profiledata['deliveryPhone'] ?? '';
    }



    public function updateDeliveryAddress()
    {
        $user = Auth::user();
        $profileData = $user->profiledata;
        $profileData['deliveryName'] = $this->deliveryName;
        $profileData['deliverySurname'] = $this->deliverySurname;
        $profileData['deliveryStreet'] = $this->deliveryStreet;
        $profileData['deliveryCity'] = $this->deliveryCity;
        $profileData['deliveryZip'] = $this->deliveryZip;
        $profileData['deliveryCountry'] = $this->deliveryCountry;
        $profileData['deliveryPhone'] = $this->deliveryPhone;
        // Save the updated profiledata back to the database
        $user->profiledata = $profileData;
        $user->save();
        $this->deliveryAddressUpdated = true;
        $this->alert('success',__('frontend.Data saved'));
    }


    public function updateInvoiceAddress()
    {
        $user = Auth::user();
        $profileData = $user->profiledata;
        $profileData['invoiceName'] = $this->invoiceName;
        $profileData['invoiceSurname'] = $this->invoiceSurname;
        $profileData['invoiceStreet'] = $this->invoiceStreet;
        $profileData['invoiceCity'] = $this->invoiceCity;
        $profileData['invoiceZip'] = $this->invoiceZip;
        $profileData['invoiceCountry'] = $this->invoiceCountry;
        $profileData['invoicePhone'] = $this->invoicePhone;
        $profileData['invoiceEmail'] = $this->invoiceEmail;
        // Save the updated profiledata back to the database
        $user->profiledata = $profileData;
        $user->save();
        $this->invoiceAddressUpdated = true;
        $this->alert('success',__('frontend.Data saved'));
    }

    public function updateJurinfo()
    {
        $user = Auth::user();
        $profileData = $user->profiledata;
        $profileData['companyname'] = $this->companyname;
        $profileData['companyregno'] = $this->companyregno;
        $profileData['companybank'] = $this->companybank;
        $profileData['companyaccount'] = $this->companyaccount;
        // Save the updated profiledata back to the database
        $user->profiledata = $profileData;
        $user->save();
        $this->companyUpdated = true;
        $this->alert('success',__('frontend.Data saved'));
    }


    public function updatedName()
    {
        $this->validate([
            'name' => 'required|string|min:3|max:30',
        ],[
            'name.min' => __('validation.name.min'),
            'name.max' => __('validation.name.max'),
            'name.required' => __('validation.name.required'),
        ]);

        // Update the user's name in the database
        $user = Auth::user();
        $user->name = $this->name;
        $user->save();

        $this->nameUpdated = true;
        $this->alert('success',__('frontend.Data saved'));
    }

    public function resetPassword()
    {
        $this->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8|confirmed',
        ],[
            'current_password.required' => __('validation.password.required'),
            'current_password.current_password' => __('validation.password.current_password'),
            'new_password.min' => __('validation.password.new_password.min'),
            'new_password.required' => __('validation.password.new_password.required'),
            'new_password.confirmed' => __('validation.password.new_password.confirmed'),
        ]);

        // Update the password
        $user = Auth::user();
        $user->password = Hash::make($this->new_password);
        $user->save();

        $this->passwordChanged = true;
    }


    public function render()
    {
        return view('livewire.show-client-password-reset-form');
    }
}
