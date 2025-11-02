<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'landlord_id',
        'agent_id',
        'title',
        'description',
        'type',
        'location',
        'coordinates',
        'rent_amount',
        'status'
    ];    
}
