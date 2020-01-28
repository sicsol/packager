<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogActivityTest extends TestCase
{
    use RefreshDatabase;

    public function test_log_activity()
    {
        $post = factory(\App\Post::class)->create();

        $this->assertTrue($post->exists);
        $this->assertDatabaseHas('activities', [
            'object_id' => $post->id,
            'object_type' => get_class($post),
            'verb' => 'post'
        ]);
    }

    public function test_user_has_activities()
    {
        $user = factory(\App\User::class)->create();
        factory(\App\Post::class)->create(['user_id' => $user->id]);
        factory(\App\Post::class)->create(['user_id' => $user->id]);

        $this->assertEquals($user->activity()->count(), 2);
    }
}
