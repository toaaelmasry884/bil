<?php

namespace App\Http\Controllers;

use App\bills_attachements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillsAttachementsController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [

            'file_name' => 'mimes:pdf,jpeg,png,jpg',
    
            ], [
                'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
            ]);
            
            $image = $request->file('file_name');
            $file_name = $image->getClientOriginalName();
    
            $attachments =  new bills_attachements();
            $attachments->file_name = $file_name;
            $attachments->bills_number = $request->bills_number;
            $attachments->bills_id = $request->bills_id;
            $attachments->Created_by = Auth::user()->name;
            $attachments->save();
               
            // move pic
            $imageName = $request->file_name->getClientOriginalName();
            $request->file_name->move(public_path('Attachments/'. $request->bills_number), $imageName);
            
            session()->flash('Add', 'تم اضافة المرفق بنجاح');
            return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\bills_attachements  $bills_attachements
     * @return \Illuminate\Http\Response
     */
    public function show(bills_attachements $bills_attachements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\bills_attachements  $bills_attachements
     * @return \Illuminate\Http\Response
     */
    public function edit(bills_attachements $bills_attachements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\bills_attachements  $bills_attachements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bills_attachements $bills_attachements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\bills_attachements  $bills_attachements
     * @return \Illuminate\Http\Response
     */
    public function destroy(bills_attachements $bills_attachements)
    {
        //
    }
}
