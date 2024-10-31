<?php

namespace App\Models;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{
    use HasFactory;


    protected $fillable=[
        'name',
        'type',
        'email',
        'address',
        'state',
        'city',
        'postal_code',
    ];
    public function Invoices(){
        return $this->hasMany(Invoice::class, 'customer_id'); // Correct relationship
    }
}
