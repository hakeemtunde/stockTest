<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'name', 'price', 'qty', 'measure'
    ];
    
    public function isLow() 
    {
        return $this->qty < 5;
    }
    
    public function isLowDesc()
    {
        return $this->isLow() ? 'LOW' : '';
    }
}
