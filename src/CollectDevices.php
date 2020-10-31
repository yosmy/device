<?php

namespace Yosmy;

/**
 * @di\service()
 */
class CollectDevices
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
     * @param string[]   $ids
     * @param array|null $data
     *
     * @return Devices
     */
    public function collect(
        ?array $ids,
        ?array $data
    ): Devices {
        $criteria = [];

        if ($ids !== null) {
            $criteria['_id'] = ['$in' => $ids];
        }

        if ($data !== null) {
            $criteria = array_merge(
                $criteria,
                $data
            );
        }

        $cursor = $this->manageCollection->find($criteria);

        return new Devices($cursor);
    }
}