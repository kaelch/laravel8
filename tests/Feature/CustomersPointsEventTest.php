<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\CustomersPointsEvent;
use App\Models\PointEvent;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomersPointsEventTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function register()
    {
        $customerId = 1;
        Customer::factory()->create(
            [
                'id' => $customerId
            ]
        );

        $event = new PointEvent(
            $customerId,
            '추가 이벤트',
            100,
            CarbonImmutable::create(2018, 8, 4, 12, 34, 56)
        );

        $sut = new CustomersPointsEvent();
        $sut->register($event);

        $this->assertDatabaseHas('customers_points_events',[
           'customer_id' => $customerId,
           'event' => $event->getEvent(),
           'point' => $event->getPoint(),
           'created_at' => $event->getCreatedAt()
        ]);
    }
}
