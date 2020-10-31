<?php

namespace Yosmy;

use Yosmy\Mongo;

class Devices extends Mongo\Collection
{
    /**
     * @var Device[]
     */
    protected $cursor;
}
