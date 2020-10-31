<?php

namespace Yosmy;

/**
 * @di\service()
 */
class AddDevice
{
    /**
     * @var ManageDeviceCollection
     */
    private $manageCollection;

    /**
     * @param ManageDeviceCollection $manageCollection
     */
    public function __construct(
        ManageDeviceCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @return string
     */
    public function add(): string
    {
        $id = uniqid();

        $this->manageCollection->insertOne([
            '_id' => $id,
            'data' => []
        ]);

        return $id;
    }
}