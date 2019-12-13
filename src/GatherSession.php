<?php

namespace Yosmy;

/**
 * @di\service()
 */
class GatherSession
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
     * @param string $id
     *
     * @return Session
     */
    public function gather(
        string $id
    ) {
        /** @var Session $session */
        $session = $this->manageCollection->findOne([
            '_id' => $id,
        ]);

        return $session;
    }
}