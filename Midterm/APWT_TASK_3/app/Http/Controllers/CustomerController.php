<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function __construct(){
        $this->middleware('ValidateLogin');
    }


    public function cDashboard(){
        $customer = Customer::where('customername', session()->get('customername'))->first();
        return view('customer.dashboard')->with('customer', $customer) ;
    }

    public function cDashboardSubmit(Request $request){
        $validate = $request->validate([
            'customername'=>'required|min:5|max:20',
            'email'=>'required|email|unique:customers,email',
        ],);

        $customer = Customer::where('customername', session()->get('customername'))->first();
        $customer->customername = $request->customername;
        $customer->email = $request->email;
        $customer->save();
        session()->put('message', 'Update successful.');
        return view('customer.dashboard')->with('customer', $customer) ;
    }

    public function customerEditId(Request $request){
        $customer = Customer::where('id', $request->id)->first();
        return view('customer/customerEdit')->with('customer', $customer) ;
    }

    public function customerEditSubmit(Request $request){
        $validate = $request->validate([
            'customername'=>'required|min:5|max:20',
            'email'=>'required|email|unique:customers,email',
        ],);

        $customer = Customer::where('id', $request->id)->first();
        $customer->customername = $request->customername;
        $customer->email = $request->email;
        $customer->save();
        session()->put('message', 'Update successful.');
        return redirect('admin/dashboard');
    }

    public function customerDelete(Request $request){
        $customer = Customer::where('id', $request->id)->first();
        $customer->delete();

        session()->put('message', 'Delete successful.');
        return redirect('admin/dashboard');
    }


}
