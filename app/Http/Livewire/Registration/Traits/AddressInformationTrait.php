<?php

namespace App\Http\Livewire\Registration\Traits;

use Auth;
use Closure;
use App\Models\Address;
use App\Enums\AddressType;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;

trait AddressInformationTrait{

    public $address_type, $street_address, $city, $state, $zip_code, $phone;

    public function mountAddress()
    {
        $user = Auth::user();
        $address = $user->address;

        if($address){
            $this->street_address = $address?->street_address;
            $this->city = $address->city;
            $this->state = $address->state;
            $this->zip_code = $address->zip_code;
            $this->phone = $address->phone;
        }

        $this->address_type = AddressType::Primary;

    }

    public function getAddressForm()
    {
        return [
            Hidden::make('address_type'),
            TextInput::make('street_address')->columnSpan('full')->required(),
            TextInput::make('city')->columnSpan('full')->required(),
            TextInput::make('state')->columnSpan('full')->required(),
            TextInput::make('zip_code')->columnSpan('full')->required(),
            TextInput::make('phone')->columnSpan('full')
                ->mask(fn (Mask $mask) => $mask->pattern('+{7}(000)000-00-00'))
                ->required()
                ->tel()
                ->telRegex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\.\/0-9]*$/'),
        ];
    }

    public function saveAddress()
    {
        $user = Auth::user();

        Address::updateOrCreate([
            'user_id' => $user->id,
        ],
        [   
            'address_type' => $this->address_type,
            'street_address' => $this->street_address,
            'city' => $this->city,
            'state' => $this->state,
            'zip_code' => $this->zip_code,
            'phone' => $this->phone,
        ]);
    }
}