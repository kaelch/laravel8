<?php

namespace Tests\Feature;

use App\Models\CustomersPoint;
use App\Models\CustomersPointsEvent;
use App\Models\PointEvent;
use App\Services\AddPointService;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddPointServiceWithMockTest extends TestCase
{
    private CustomersPointsEvent $customersPointsEvent;
    private CustomersPoint $customersPoint;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->customersPointsEvent = new class extends CustomersPointsEvent{
          public PointEvent $pointEvent;

          public function register(PointEvent $pointEvent)
          {
              $this->pointEvent = $pointEvent;
          }
        };

        $this->customersPoint = new class extends CustomersPoint{
          public $customerId;
          public $point;

          public function addPoint(int $customerId, int $point): bool
          {
              $this->customerId = $customerId;
              $this->point = $point;
              return true;
          }

        };
    }

    /**
     * @test
     */
    public function add()
    {
        $customerId = 1;
        $event = new PointEvent(
            $customerId,
            '추가 이벤트',
            10,
            CarbonImmutable::create(2019, 8, 4, 12, 34, 56)
        );

        $service = new AddPointService(
            $this->customersPointsEvent,
            $this->customersPoint
        );
        $service->add($event);

        $this->assertEquals($event, $this->customersPointsEvent->pointEvent);
        $this->assertSame($customerId, $this->customersPoint->customerId);
        $this->assertSame(10, $this->customersPoint->point);
    }


}
