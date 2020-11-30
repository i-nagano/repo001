<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    public function receipt() {
        return $this->belongsTo('App\Models\Receipt');
    }

    public function sweet() {
        return $this->belongsTo('App\Models\Sweet');
    }
}
