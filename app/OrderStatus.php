<?php

namespace App;

enum OrderStatus: int
{
    case PENDING = 0;
    case PREPARING = 1;
    case WAITING_FOR_APPROVAL = 2;
    case WAITING_FOR_PAYMENT = 3;
    case APPROVED = 4;
    case SHIPPED = 5;
    case DELIVERED = 6;
    case CANCELLED = 7;
    case DAY_HAS_PASSED = 90;
}
