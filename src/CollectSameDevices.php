<?php

namespace Yosmy;

/**
 * @di\service()
 */
class CollectSameDevices
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
     * @param string $device
     *
     * @return Devices
     */
    public function collect(
        string $device
    ): Devices {
        /** @var Device $device */
        $device = $this->manageCollection->findOne([
            '_id' => $device
        ]);

        $data = $device->getData();

        $criteria = $this->buildCriteria(
            $data
        );

        $cursor = $this->manageCollection->find($criteria);

        return new Devices($cursor);
    }

    /**
     * @param array $data
     *
     * @return array
     */
    private function buildCriteria(
        array $data
    ): array {
        $criteria = [];

        $application = $data['application'];

        if (isset($application['androidId'])) {
            $criteria[] = ['data.application.androidId' => $application['androidId']];
        }

        if (isset($applicationData['iosIdForVendor'])) {
            $criteria[] = ['data.application.iosIdForVendor' => $application['iosIdForVendor']];
        }

        $device = $data['device'];

        if (isset($data['device']['osBuildFingerprint'])) {
            $criteria[] = ['data.device.osBuildFingerprint' => $device['osBuildFingerprint']];
        }

        if (isset($device['installationId'])) {
            $criteria[] = ['data.device.installationId' => $device['installationId']];
        }

        return [
            '$or' => $criteria
        ];
    }
}