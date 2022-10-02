<?php

namespace Tests\Feature;

use App\Loan;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApproveloanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApproveloan()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $userData = User::where('id',$user->id)->first();
        $loan = Loan::where('user_id',$userData->id)->first();
        $formData = [
            'username'=>$userData->username,
            'secret'=>$userData->secret_key,
            'loan_id'=>$loan->id
        ];
        $this->json('POST',round('approveloan'),$formData)
        ->assertStatus(200);
    }
}
