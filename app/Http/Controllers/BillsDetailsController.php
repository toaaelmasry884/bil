<?php

namespace App\Http\Controllers;

use App\bills_details;
use App\bills;
use App\bills_attachements;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Http\Request;

class BillsDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $bills = bills_details::all();
        // return view('bills.bills_details',compact('bills'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bills_details  $bills_details
     * @return \Illuminate\Http\Response
     */
    public function show(bills_details $bills_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bills_details  $bills_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
         $bills = bills::where('id',$id)->first();
         $details  = bills_Details::where('id_bills',$id)->get();
         $attachments  = bills_attachements::where('bills_id',$id)->get();

        return view('bills.bills_details',compact('bills','details','attachments'));

        // ,'details','attachments'
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bills_details  $bills_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bills_details $bills_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bills_details  $bills_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $bills = bills_attachements::findOrFail($request->id_file);
        $bills->delete();
        Storage::disk('public_uploads')->delete($request->bills_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function get_file($bills_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($bills_number.'/'.$file_name);
        return response()->download( $contents);
    }

    public function open_file($bills_number,$file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($bills_number.'/'.$file_name);
        return response()->file($files);
    }
}
