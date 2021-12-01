<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormFieldOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'form_field_id',
        'option',
    ];

    protected $casts = [
        'option' => 'string',
    ];

    public function form_field()
    {
        return $this->belongsTo(FormField::class);
    }
}
