<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing_details extends Model
{
    use HasFactory;

    public function relationWithCountry()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    public function relationWithState()
    {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function relationWithCity()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

}
