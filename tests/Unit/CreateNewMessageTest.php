<?php

namespace Tests\Unit;

use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class CreateNewMessageTest extends TestCase
{

    use RefreshDatabase;


    public function test_home_screen()
    {
        $response = $this->get('/home');
 
        $response->assertStatus(200);
    }
 
    public function test_user_creates_new_message()
    {
        $response = $this->post('/message.store', [
            'user_id' => 2,
            'message' => 'message',
            'reply' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
 
        $response->assertStatus(200);
    }

}
