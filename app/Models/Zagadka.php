<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zagadka extends Model
{
    protected $table = 'zagadkas';

    protected $fillable = ['emoji', 'odpowiedz'];
}
