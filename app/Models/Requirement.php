<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Multitenantable;


class Requirement extends Model
{
    use HasFactory;
    use Multitenantable;
}
