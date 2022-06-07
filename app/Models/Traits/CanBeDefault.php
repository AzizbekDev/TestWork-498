<?php

namespace App\Models\Traits;


trait CanBeDefault
{
    public static function boot()
    {
        parent::boot();
        static::creating(function ($address) {
            if ($address->default) {
                    $address->newQuery()->whereHas('users', function ($q) {
                        $q->where('user_id', request()->user()->id);
                    })->update([
                        'default' => false
                    ]);
                }
        });
    }

    public function setDefaultAttribute($value)
    {
        $this->attributes['default'] = ($value === 'true' || $value ? true : false);
    }
}