<?php

namespace Yosmy;

/**
 * @di\service()
 */
class BaseGatherDevice implements GatherDevice
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
     * {@inheritDoc}
     */
    public function gather(
        string $id
    ): Device {
        /** @var BaseDevice $device */
        $device = $this->manageCollection->findOne([
            '_id' => $id,
        ]);

        return $device;
    }
}