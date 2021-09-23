<?php

namespace App\Http\Controllers;
use App\Owner;
use App\Address;
use App\Car;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Return a list of all owners.
     *
     * @return array
     */
    public function index(): array
    {
        return Owner::with('addresses','cars')->get()->toArray();
    }

    /**
     * Return a single owner.
     *
     * @param Owner $owner
     * @return Owner
     */
    public function show(Owner $owner): JsonResponse
    {
        
        return response()->json(['owner' => $owner, 'cars' => $owner->cars, 'addresses' => $owner->addresses], 200);
    }

    /**
     * Store an owner.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $owner = Owner::create($request->all());

        return response()->json($owner, 201);
    }

    /**
     * Update an owner.
     *
     * @param Request $request
     * @param Owner $owner
     * @return JsonResponse
     */
    public function update(Request $request, Owner $owner): JsonResponse
    {
        $owner->update($request->all());

        return response()->json($owner, 200);
    }

    /**
     * Delete an owner.
     *
     * @param Owner $owner
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(Owner $owner): JsonResponse
    {
        $owner->delete();

        return response()->json(null, 204);
    }

    /**
     * Average number of addresses and cars 
     *
     * @param Owner $owner
     * @return JsonResponse
     * @throws Exception
     */
    public function ownersAverage(): JsonResponse
    { 
        $data = [
                'addressAverage' => 0,
                'carsAverage' => 0
                ];

        $addressAverage = DB::table(with(new Address)->getTable())->selectRaw("COUNT(*)/COUNT(DISTINCT owner_id) AS address_avg")->first();
        $carsAverage    = DB::table(with(new Car)->getTable())->selectRaw("COUNT(*)/COUNT(DISTINCT owner_id) AS cars_avg")->first();

        if($addressAverage){
            $data['addressAverage'] = $addressAverage->address_avg;
        }
        if($addressAverage){
            $data['carsAverage'] = $carsAverage->cars_avg;
        }

        return response()->json($data, 200);
    }


}
