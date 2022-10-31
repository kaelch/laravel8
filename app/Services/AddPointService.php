<?php

namespace App\Services;

use App\Models\CustomersPoint;
use App\Models\CustomersPointsEvent;
use App\Models\PointEvent;

class AddPointService
{
    private CustomersPoint $customersPoint;
    private CustomersPointsEvent $customersPointsEvent;
    private $db;

    public function __construct(CustomersPointsEvent $customersPointsEvent, CustomersPoint $customersPoint)
    {
        $this->customersPoint = $customersPoint;
        $this->customersPointsEvent = $customersPointsEvent;
        $this->db = $customersPointsEvent->getConnection();
    }

    /**
     * @throws \Throwable
     */
    public function add(PointEvent $event)
    {
        $this->db->transaction(
            function () use ($event){
                $this->customersPointsEvent->register($event);

                $this->customersPoint->addPoint(
                    $event->getCustomerId(),
                    $event->getPoint()
                );
            }
        );
    }

}
