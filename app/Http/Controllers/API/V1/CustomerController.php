<?php

namespace App\Http\Controllers\API\V1;

use App\Filters\V1\CustomersFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Requests\V1\CustomerFilterRequest;
use App\Http\Resources\V1\CustomerCollection;
use App\Models\Customer;
use App\Http\Resources\V1\CustomerResource;
use App\Settings\V1\BaseSettings;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param CustomerFilterRequest $request
     * @return CustomerCollection
     */
    public function index(
        CustomerFilterRequest $request,
    ): CustomerCollection
    {
        $filteredResults = (new CustomersFilter($request))
            ->apply(Customer::query())
            ->paginate(BaseSettings::PAGINATION_BY_DEFAULT)
            ->withQueryString();

        return new CustomerCollection($filteredResults);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
