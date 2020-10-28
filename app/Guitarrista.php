<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guitarrista extends Model
{
    protected $fillable = ['nome', 'banda', 'idade'];
}
