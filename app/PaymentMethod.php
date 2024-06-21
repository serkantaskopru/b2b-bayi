<?php

namespace App;

enum PaymentMethod: int
{
    case PayAtTheDoor = 0;
    case CreditCard = 1;
    case AccountTransfer = 2;
    case TransferToCompany = 3;
}
