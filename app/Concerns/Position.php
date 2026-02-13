<?php

namespace App\Concerns;

use Stevebauman\Location\Position as BasePosition;

class Position extends BasePosition
{
    public ?string $isp = null;

}
