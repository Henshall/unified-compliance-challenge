<?php

namespace App\Http\Controllers;

use App\Address;
use App\Car;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Return a list of all addresses.
     *
     * @return array
     */
    public function index(): array
    {
        //return Address::all()->toArray();
        return Address::with('owners','cars')->get()->toArray();
    }

    /**
     * Return a single address.
     *
     * @param Address $address
     * @return Address
     */
    public function show(Address $address): JsonResponse
    {
     
        return response()->json(['address' => $address, 'cars' => $address->cars, 'owners' => $address->owners], 200);
    
    }

    /**
     * Store an address.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $address = Address::create($request->all());

        return response()->json($address, 201);
    }

    /**
     * Update an address.
     *
     * @param Request $request
     * @param Address $address
     * @return JsonResponse
     */
    public function update(Request $request, Address $address): JsonResponse
    {
        $address->update($request->all());

        return response()->json($address, 200);
    }

    /**
     * Delete an address.
     *
     * @param Address $address
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json(null, 204);
    }
       
    /**
     * Average number of cars per address
     *
     * @param Address $address
     * @return JsonResponse
     * @throws Exception
     */
    public function addressesAverage(): JsonResponse
    { 
        $data = ['carsAverage' => 0];
       
        $carsAverage = DB::table(with(new Car)->getTable())->selectRaw("COUNT(*)/COUNT(DISTINCT address_id) AS cars_avg")->first();
      
        if($carsAverage){
            $data['carsAverage'] = $carsAverage->cars_avg;
        }

        return response()->json($data, 200);
    }

}
