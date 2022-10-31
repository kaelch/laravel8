<?php

namespace App\Models;

use Carbon\CarbonImmutable;

class PointEvent
{
    private $customerId;
    private $event;
    private $point;
    private $createdAt;

    public function __construct(int $customerId, string $event, int $point, CarbonImmutable $createdAt)
    {
        $this->customerId = $customerId;
        $this->event = $event;
        $this->point = $point;
        $this->createdAt = $createdAt;
    }

    public function getCustomerId(): int
    {
        return $this->customerId;
    }

    public function getEvent(): string
    {
        return $this->event;
    }

    public function getPoint(): int
    {
        return $this->point;
    }

    public function getCreatedAt(): CarbonImmutable
    {
        return $this->createdAt;
    }
}
