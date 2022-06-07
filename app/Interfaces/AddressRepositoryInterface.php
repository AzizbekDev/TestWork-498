<?php

namespace App\Interfaces;

interface AddressRepositoryInterface 
{
    public function getAllAddress();
    
    public function getDefaultAddress();

    public function getAddressById($addressId);
    
    public function makeAddress(array $addressDetails);

    public function deleteAddress($addressId);
}