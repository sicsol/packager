<?php

namespace App\Traits;

use App\Activity;

trait HasActivity
{
    public function activity()
    {
        return $this->morphMany(Activity::class, 'actor');
    }
}
