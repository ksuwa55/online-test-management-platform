<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title','start_date','end_date','person_email'];

    use Multitenantable;

}
