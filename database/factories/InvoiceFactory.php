<?php

namespace Database\Factories;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $status = $this->faker->randomElement(['B','P','V']);
        $customer = Customer::factory()->create();
        return [
            'customer_id'=>$customer->id,
            'amount' => $this->faker->numberBetween(100,20000),
            'status' =>$status,
            'billed_date'=>$this->faker->dateTimeThisDecade(),
            'paid_date' =>$status =='P' ? $this->faker->dateTimeThisDecade():NULL
        ];
    }
}
