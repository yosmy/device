<?php

namespace Yosmy;

interface GatherDevice
{
    /**
     * @param string $id
     *
     * @return Device
     */
    public function gather(
        string $id
    ): Device;
}