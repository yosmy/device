<?php

namespace Yosmy\Device;

use Yosmy\ManageDeviceCollection;

/**
 * @di\service()
 */
class SetData
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
     * @param string $id
     * @param array  $data
     */
    public function set(
        string $id,
        array $data
    ): string {
        $this->manageCollection->updateOne(
            [
                '_id' => $id
            ],
            [
                '$set' => [
                    'data' => $data
                ]
            ]
        );

        return $id;
    }
}