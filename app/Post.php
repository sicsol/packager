<?php

namespace App;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use LogsActivity;

    public function activityVerb()
    {
        return 'post';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
