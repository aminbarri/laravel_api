<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Customer::factory()
            ->count(25)
            ->hasInvoices(18) // Corrected chaining operator
            ->create();
            
        Customer::factory()
            ->count(180)
            ->hasInvoices(5) // Corrected chaining operator
            ->create();

        Customer::factory()
            ->count(180)
            ->hasInvoices(3) // Corrected chaining operator
            ->create();

        Customer::factory()
            ->count(5)
            ->create();
    }
}
