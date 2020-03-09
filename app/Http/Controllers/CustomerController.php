<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use \App\Models\Customer as Customer; 

class CustomerController extends Controller 
{ 
    public function new() 
    { 
        return view('customers.new'); 
    } 

   public function create(Request $request)      
{
    //instantiate a new Customer object from the Model class
    $customer = new Customer();
    //call setter on the object passing values from the View
    $customer->setFirstname($request->firstname);
    $customer->setSurname($request->surname);
    //save the object which will create a new customer in the DB
    $customer->save();        
}
	public function edit($id)
{
     $customer = Customer::find($id);
     return view('customers.edit')->with('customer', $customer);
}
	public function update(Request $request)
{
     $customer = Customer::find($request->id);
     $customer->setFirstname($request->firstname);
     $customer->setSurname($request->surname);
     $customer->save();
}
} 
?> 