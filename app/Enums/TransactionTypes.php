<?php

namespace App\Enums;

enum TransactionTypes: string {
    case Credit = 'credit';

    case Debit = 'debit';
}