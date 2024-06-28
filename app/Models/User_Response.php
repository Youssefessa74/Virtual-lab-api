<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Response extends Model
{
    use HasFactory;
    protected $table = 'user_responses';
    protected $guarded =[];
}
