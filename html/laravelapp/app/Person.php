<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function getData()
    {
        $data = $this->id . ': ' . $this->name . ' (' . $this->age . ')';
        return $data;
    }
}
