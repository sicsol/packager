<?php

namespace App\Traits;

use App\Activity;

trait LogsActivity
{
    protected static $observer = '\App\Observers\LogActivityObserver';

    protected static function bootLogsActivity()
    {
        static::observe(new static::$observer);
    }

    public function activityVerb()
    {
        return '';
    }

    public function activityActor()
    {
        return 'user';
    }

    protected function getActorModel()
    {
        return $this->{$this->activityActor()};
    }

    public function activityForeign()
    {
        return '';
    }

    protected function getForeignModel()
    {
        return $this->{$this->activityForeign()};
    }

    protected function getClassName($model)
    {
        return get_class($model);
    }

    protected function getModelKey($model)
    {
        return $model->getKey();
    }

    public function createActivity()
    {
        $data = [];
        $data['verb'] = $this->activityVerb();

        $actor = $this->getActorModel();
        $data['actor_id'] = $this->getModelKey($actor);
        $data['actor_type'] = $this->getClassName($actor);

        $data['object_id'] = $this->getModelKey($this);
        $data['object_type'] = $this->getClassName($this);

        $foreign = $this->getForeignModel();
        if($foreign)
        {
            $data['foreign_id'] = $this->getModelKey($foreign);
            $data['foreign_type'] = $this->getClassName($foreign);
        }

        return Activity::create($data);
    }
}
