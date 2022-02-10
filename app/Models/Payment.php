<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'enquiry_id',
        'payment_method',
        'payment_mode',
        'reference_number',
        'amount',
        'tax_number',
    ];

    public function enquiry()
    {
        return $this->hasOne(Enquiry::class, 'enquiry_id', 'enquiry_id');
    }
}
