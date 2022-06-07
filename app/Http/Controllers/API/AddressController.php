<?php

namespace App\Http\Controllers\API;

use App\Interfaces\AddressRepositoryInterface;
use App\Http\Requests\Addresses\AddressStoreRequest;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;

class AddressController extends BaseController
{
    private AddressRepositoryInterface $addressRepository;

    public function __construct(AddressRepositoryInterface $addressRepository)
    {
        $this->middleware(['auth:api']);

        $this->addressRepository = $addressRepository;
    }

    public function index(Request $request)
    {
        if($request->has('default')){
            $address = $this->addressRepository->getDefaultAddress();
        }else{
            $address = $this->addressRepository->getAllAddress();
        }
        
        return $this->sendResponse(AddressResource::collection($address), 'Success info');
    }

    public function store(AddressStoreRequest $request)
    {
        $address = $this->addressRepository->makeAddress($request->all());

        $request->user()->addresses()->save($address);

        return $this->sendResponse(
            new AddressResource($address),
            'Address saved successfully'
        );
    }

    public function destroy(Request $request, $addressId)
    {
        $address = $this->addressRepository->deleteAddress($addressId);
        return $this->sendResponse($address,
            'Address successfully destoyed'
        );
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
