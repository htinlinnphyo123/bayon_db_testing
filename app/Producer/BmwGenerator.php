<?php

namespace App\Producer;

use App\Interface\CarGenerateInterface;

class BmwGenerator implements CarGenerateInterface
{
    public $color;
    public function __construct($color)
    {
        $this->color = $color;
    }

    public function getInfo(): string
    {
        return 'We are producing BMW with ' . $this->color . ' color.';
    }

}