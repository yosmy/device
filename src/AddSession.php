<?php

namespace Yosmy;

/**
 * @di\service()
 */
class AddSession
{
    /**
     * @var ManageSessionCollection
     */
    private $manageCollection;

    /**
     * @param ManageSessionCollection $manageCollection
     */
    public function __construct(
        ManageSessionCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param array $data
     *
     * @return string
     */
    public function add(
        array $data
    ) {
        $id = uniqid();

        $this->manageCollection->insertOne([
            '_id' => $id,
            'data' => $data
        ]);

        return $id;
    }
}