<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_post()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/posts', [
                'title' => 'Test Post',
                'content' => 'This is a test post.',
            ]);

        $this->assertDatabaseHas('posts', [
            'title' => 'Test Post',
        ]);
    }

    // Add more tests for update, delete, etc.
}