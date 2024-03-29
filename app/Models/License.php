<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'serial'];

    public function software ()
    {
        return $this->belongsTo(Software::class);
    }
}
