<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomersPointsEvent extends Model
{
    use HasFactory;
    protected $table = 'customers_points_events';

    public function register(PointEvent $pointEvent)
    {
        $new = $this->newInstance();
        $new->customer_id = $pointEvent->getCustomerId();
        $new->event = $pointEvent->getEvent();
        $new->point = $pointEvent->getPoint();
        $new->created_at = $pointEvent->getCreatedAt()->toDateTimeString();
        $new->save();

    }
}
