<?php

namespace Tests\Unit;

use App\Models\User;
use Carbon\Carbon;
use Database\Factories\UserFactory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateNewMessageTest extends TestCase
{

    use DatabaseTransactions;

    protected User $user;

    public function test_home_screen()
    {
        $response = $this->get('/home');
 
        $response->assertStatus(200);
    }
 
    protected function setUp(): void
    {
 
        parent::setUp();

        $this->user = UserFactory::new()->create();

    }

    public function test_user_creates_new_message()
    {

        $response = $this->actingAs($this->user)->post('/messages/store', [
            'message' => 'message',
            'created_at' => Carbon::now()
        ]);
 
        $response->assertRedirect('/');
    }

}
