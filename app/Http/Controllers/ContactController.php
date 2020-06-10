<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        $attributes = $this->validateContact();
        
        $attributes['replied'] = false;

        if(Contact::create($attributes)){
            $response = 1;
        }else{
            $response = 0;
        }

        return redirect()->route('contact', ['sent' => $response]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }

    public function admin()
    {

        $headings = array('ID', 'Nombre', 'Email', 'Asunto', 'Contestado');

        $items = Contact::orderBy('id')->get(['id', 'name', 'email', 'subject', 'replied'])->toArray();

        return view('admin.contacts.index', compact('headings', 'items'));
    }

    protected function validateContact()
    {

        $attributes = request()->validate([
            'name'              => ['string', 'required', 'max:255'],
            'phone'             => ['string', 'required', 'max:255'],
            'email'             => ['string', 'required', 'max:455'],
            'subject'           => ['string', 'required'],
            'description'       => ['string', 'required']
        ]);

        return $attributes;

    }


}
