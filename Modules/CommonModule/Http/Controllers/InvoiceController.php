<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 29/08/18
 * Time: 09:50 م
 */

namespace Modules\CommonModule\Http\Controllers;

use Illuminate\Http\Request;
use Modules\CommonModule\Entities\Invoice;
use Modules\TripModule\Entities\Trip;

class InvoiceController
{

    function index()
    {
        $invoices = Invoice::orderBy('id','desc')->get();
        return view('commonmodule::invoices.index', compact('invoices'));
    }

    function indexTransaction()
    {
        $transactions = Transaction::orderBy('created_at', 'desc')->paginate(20);
        $total= Transaction::where('msg','Approved')->sum('amount');
        return view('admin.transactions.index', compact('transactions','total'));
    }


    function searchTransaction(Request $request)
    {
        $name = $request->get('name');
        $ref = Invoice::where('name','LIKE','%'.$name.'%')->pluck('merchant_ref')->toArray();
        $transactions = Transaction::whereIN('merchant_ref', $ref)->orderBy('created_at', 'desc')->paginate(20);
        $total= Transaction::where('msg','Approved')->count('amount');
        return view('commonmodule::transactions.index', compact('transactions','total'));
    }


    function create()
    {
        $trips = Trip::all();
        return view('commonmodule::invoices.create', compact('trips'));
    }


    public function postCreate(Request $request)
    {

        $all = $request->except('_token');
        $invoice = Invoice::create($all);
        $id = $invoice->id;

        return view('commonmodule::invoices.invoice_link', compact('id'))
            ->withFlashMessage('Succeful Generated ');

    }


    public function delete($id){
        Invoice::where('id',$id)->delete();
        return redirect()->back();
    }

}
