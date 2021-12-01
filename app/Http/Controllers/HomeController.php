<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $forms = Form::select('id', 'name')->paginate();
        return view('home.index', compact('forms'));
    }

    public function form_detail(Form $form)
    {
        $form->load('attributes', 'attributesFormField.options')->get();
        // dd($form);
        return view('home.form_detail', compact('form'));
    }
}
