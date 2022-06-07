<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CanBeDefault;

class Address extends Model
{
    use HasFactory, CanBeDefault;
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'city',
        'postal_code',
        'country_id',
        'default'
    ];

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'users_addresses',
            'address_id',
            'user_id');
    }

    public function scopeDefault($query){
        return $query->where('default', true);
    }
}
