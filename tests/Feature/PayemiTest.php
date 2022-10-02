<?php

namespace Tests\Feature;

use App\Loan;
use App\PaymentMeta;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PayemiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPayemi()
    {
        $this->withExceptionHandling();
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $userData = User::where('id',$user->id)->first();
        $loan = Loan::where('user_id',$userData->id)->first();
        $payment_metas = PaymentMeta::where('loan_id',$loan->id)->first();

        $formData = [
            'username'=>$userData->username,
            'secret'=>$userData->secret_key,
            'amount'=>$payment_metas->installment_amount,
            'meta_id'=>$payment_metas->id
        ];
        $this->json('POST',round('payemi'),$formData)
        ->assertStatus(200);
    }
}
