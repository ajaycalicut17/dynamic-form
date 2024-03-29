<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'form_id',
        'form_field_id',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }

    public function formField()
    {
        $this->hasOne(FormField::class);
    }
}
