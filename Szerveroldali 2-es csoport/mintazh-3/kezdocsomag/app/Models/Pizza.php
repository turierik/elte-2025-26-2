<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'size',
        'base',
        'cheese_crust',
        'customer_id'
    ];

    protected $casts = [
        'size' => 'integer',
        'cheese_crust' => 'boolean'
    ];

    public function customer(){
        return $this -> belongsTo(Customer::class);
    }

    public function toppings(){
        return $this -> belongsToMany(Topping::class) -> withPivot('amount');;
    }

    public function price(){
        return $this -> size * 100 +
            $this -> toppings -> map(fn($t) => $t -> price * $t -> pivot -> amount) -> sum();
    }
}
