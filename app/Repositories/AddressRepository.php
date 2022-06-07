<?php

namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface 
{
    public function getAllAddress()
    {
        return request()->user()->addresses;
    }

    public function getDefaultAddress() 
    {
        $userId = request()->user()->id;
        return Address::with('users')
        ->default()
        ->whereHas('users', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->get();
    }

    public function getAddressById($addressId) 
    {
        return Address::findOrFail($addressId);
    }

    public function makeAddress(array $addressDetails) 
    {
        return Address::create($addressDetails);
    }

    public function deleteAddress($addressId) 
    {
        Address::destroy($addressId);
    }
}
