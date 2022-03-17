<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'title',
        'price',
        'quantity',
    ];

    protected $appends = [
        'subtotal',
    ];

    public function getSubtotalAttribute()
    {
        return $this->price * $this->quantity;
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

}
