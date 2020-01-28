<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = [];

    public function actor()
    {
        return $this->morphTo();
    }

    public function object()
    {
        return $this->morphTo();
    }

    public function foreign()
    {
        return $this->morphTo();
    }
}
