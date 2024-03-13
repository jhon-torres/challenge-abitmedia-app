<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;
    protected $fillable = ['description', 'price', 'os', 'stock', 'sku'];

    public function license()
    {
        return $this->hasOne(License::class);
    }
}
