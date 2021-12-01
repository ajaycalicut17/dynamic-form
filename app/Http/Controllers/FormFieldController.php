<?php

namespace App\Http\Controllers;

use App\Models\FormField;
use App\Http\Requests\StoreFormFieldRequest;
use App\Http\Requests\UpdateFormFieldRequest;
use App\Models\Field;

class FormFieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $form_fields = FormField::select('id', 'label')->paginate();
        return view('form_field.index', compact('form_fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = Field::select('id', 'name')->get();
        return view('form_field.create', compact('fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormFieldRequest $request)
    {
        FormField::create([
            'label' => $request->label,
            'field_id' => $request->field_type
        ]);

        return redirect('/form_field')->with('status', 'Form field created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function show(FormField $formField)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function edit(FormField $formField)
    {
        $fields = Field::select('id', 'name')->get();
        return view('form_field.edit', compact('fields', 'formField'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormFieldRequest  $request
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormFieldRequest $request, FormField $formField)
    {
        $formField->label = $request->label;
        $formField->field_id = $request->field_type;
        $formField->save();

        return redirect('/form_field')->with('status', 'Form field updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormField  $formField
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormField $formField)
    {
        $formField->delete();

        return redirect('/form_field')->with('status', 'Form field deleted');
    }
}
