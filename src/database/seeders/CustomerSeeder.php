<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SalesOrder;
use App\Models\Customer;
use App\Models\SalesOrderItem;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        Customer::factory()
            ->count(10)
            ->create()
            ->each(function (Customer $customer) {
                SalesOrder::factory()
                    ->count(5)
                    ->make([
                        'customer_id' => $customer->id,
                    ])
                    ->each(function (SalesOrder $salesOrder) {
                        
                        $salesOrder->amount = $salesOrder->salesOrderItems->sum('amount');
                        $salesOrder->save();
                        
                        SalesOrderItem::factory()->count(5)->create([
                            'sales_order_id' => $salesOrder->id,
                        ]);
                    });
        });
    }
}
