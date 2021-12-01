<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Form extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $casts = [
        'name' => 'string',
    ];

    public function attributes()
    {
        return $this->hasMany(FormAttribute::class);
    }

    public function attributesFormField()
    {
        return $this->hasManyThrough(FormField::class, FormAttribute::class, 'form_id', 'id', 'id', 'form_field_id'
        );
    }
}
