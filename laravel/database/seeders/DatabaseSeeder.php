<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $employees = Employee::factory(5)->create();
        $customers = array();

        for ($i = 0; $i < 20; $i++) {
            $customers[] = Customer::factory()->create(['employee_id' => $employees->random()]);
        }

        foreach ($customers as $customer) {
            Order::factory(7)->create(['customer_id' => $customer->id]);
        }
    }
}
