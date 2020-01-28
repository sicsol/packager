<?php

namespace App\Observers;

class LogActivityObserver
{
    public function created($model)
    {
        $model->createActivity();
    }
}
