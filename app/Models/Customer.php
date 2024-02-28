<?php

namespace App\Models;

use App\Models\PlacingOrder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function placingOrders(){
        return $this->belongsTo(PlacingOrder::class);
    }
}
