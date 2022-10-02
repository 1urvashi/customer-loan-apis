<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApplyloanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApplyloan()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        $formData = [
            'username'=>$user->username,
            'amount'=>'10000',
            'tenor'=>'3',
            'secret'=>$user->secret_key
        ];
        $this->json('POST',round('applyloan'),$formData)
        ->assertStatus(200);
    }
}
