<?php

namespace Yosmy;

interface Device
{
    /**
     * @return string
     */
    public function getId(): string;

    /**
     * @return array
     */
    public function getData(): array;
}