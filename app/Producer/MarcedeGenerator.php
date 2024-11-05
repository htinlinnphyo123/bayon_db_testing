<?php

namespace App\Producer;

use App\Interface\CarGenerateInterface;

class MarcedeGenerator implements CarGenerateInterface
{
    public $color;
    public function __construct($color)
    {
        $this->color = $color;
    }
    public function getInfo(): string
    {
        return 'We are producing Marcede with ' . $this->color . ' color.';
    }
}