<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'stock_id', 'qty', 'cost'
    ];
    
    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
