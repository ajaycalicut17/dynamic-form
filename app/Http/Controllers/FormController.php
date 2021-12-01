<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdateFormRequest;
use App\Models\FormField;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = Form::select('id', 'name')->paginate();
        return view('form.index', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $form_fields = FormField::select('id', 'label')->get();
        return view('form.create', compact('form_fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        $form = Form::create([
            'name' => $request->name,
        ]);

        $attributes = [];
        foreach ($request->form_field as $key => $form_field) {
            $attributes[$key]['form_field_id'] = $form_field;
        }

        $form->attributes()->createMany($attributes);

        return redirect('/form')->with('status', 'Form created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function show(Form $form)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function edit(Form $form)
    {
        $form->load('attributes:id,form_id,form_field_id')->first();
        $form_fields = FormField::select('id', 'label')->get();
        return view('form.edit', compact('form_fields', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormRequest  $request
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormRequest $request, Form $form)
    {
        $form->name = $request->name;
        $form->save();

        $form->attributes()->forceDelete();

        $attributes = [];
        foreach ($request->form_field as $key => $form_field) {
            $attributes[$key]['form_field_id'] = $form_field;
        }

        $form->attributes()->createMany($attributes);

        return redirect('/form')->with('status', 'Form updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Form  $form
     * @return \Illuminate\Http\Response
     */
    public function destroy(Form $form)
    {
        $form->delete();

        return redirect('/form')->with('status', 'Form deleted');
    }
}
