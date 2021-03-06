<?php

namespace App\Models;

use App\Models\BaseModels\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends BaseModel
{
    use HasFactory;

    public $fillable = [
        'content',
        'name',
        'job',
        'status',
    ];
}
