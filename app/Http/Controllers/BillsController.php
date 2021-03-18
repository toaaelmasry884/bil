<?php

namespace App\Http\Controllers;

use App\bills;
use App\sections;
use App\bills_details;
use App\bills_attachements;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $bills = bills::all();
        return view('bills.bill',compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sections = sections::all();
        return view('bills.add_bills',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        bills::create([
            'bills_number' => $request->bills_number,
            'bills_Date' => $request->bills_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'Status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note
        ]);

        $bills_id = bills::latest()->first()->id;
        bills_details::create([
            'id_bills' => $bills_id,
            'bills_number' => $request->bills_number,
            'product' => $request->product,
            'section' => $request->Section,
            'status' => 'غير مدفوعة',
            'Value_Status' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);
        if ($request->hasFile('pic')) {
             //id الخاص بالفاتوره
            $bills_id = bills::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $bills_number = $request->bills_number;

            $attachments = new bills_attachements();
            $attachments->file_name = $file_name;
            $attachments->bills_number = $bills_number;
            $attachments->Created_by = Auth::user()->name;
            $attachments->bills_id = $bills_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $bills_number), $imageName);
        }


           // $user = User::first();
           // Notification::send($user, new AddInvoice($invoice_id));

        // $user = User::get();
        // $invoices = invoices::latest()->first();
        // Notification::send($user, new \App\Notifications\Add_invoice_new($invoices));

     




        
        // event(new MyEventClass('hello world'));

        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function show(bills $bills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $bills = bills::where('id',$id)->first();
        $sections  = sections::all();
        

       return view('bills.edit_bills',compact('bills','sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bills $bills)
    {
        //
        $bills = bills::findOrFail($request->bills_id);
        $bills->update([
            'bills_number' => $request->bills_number,
            'bills_Date' => $request->bills_Date,
            'Due_date' => $request->Due_date,
            'product' => $request->product,
            'section_id' => $request->Section,
            'Amount_collection' => $request->Amount_collection,
            'Amount_Commission' => $request->Amount_Commission,
            'Discount' => $request->Discount,
            'Value_VAT' => $request->Value_VAT,
            'Rate_VAT' => $request->Rate_VAT,
            'Total' => $request->Total,
            'note' => $request->note,
        ]);

        session()->flash('edit', 'تم تعديل الفاتورة بنجاح');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function destroy(bills $bills)
    {
        //
    }
    public function getproducts($id)
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("product_name", "id");
        return json_encode($products);
    }
}
