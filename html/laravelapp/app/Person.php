<?php

namespace App;

use App\Scopes\ScopePerson;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ScopePerson);
    }

    public function getData()
    {
        $data = $this->id . ': ' . $this->name . ' (' . $this->age . ')';
        return $data;
    }

    public function scopeNameEqual($query, $name)
    {
        return $query->where('name', $name);
    }

    public function scopeAgeGreaterThan($query, $min)
    {
        return $query->where('age', '>=', $min);
    }

    public function scopeAgeLessThan($query, $max)
    {
        return $query->where('age', '<=', $max);
    }
}
