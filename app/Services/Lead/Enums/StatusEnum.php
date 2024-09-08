<?php

namespace App\Services\Lead\Enums;

enum StatusEnum: string
{
    case NEW = 'Новый';
    case WORK = 'В работе';
    case COMPLETE = 'Завершен';
}
