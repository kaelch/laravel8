<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\CustomersPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerPointTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function addPoint()
    {
        $customerId = 1;
        Customer::factory()->create([
            'id' => $customerId
        ]);

        CustomersPoint::unguard();
        CustomersPoint::create(
            [
                'customer_id' => $customerId,
                'point' => 100
            ]
        );
        CustomersPoint::reguard();

        $eloquent = new CustomersPoint();
        $result = $eloquent->addPoint($customerId, 10);

        $this->assertTrue($result);
        $this->assertDatabaseHas('customers_points',
        [
           'customer_id' => $customerId,
           'point' => 110
        ]);

    }
}
