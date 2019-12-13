<?php

namespace Yosmy;

/**
 * @di\service()
 */
class CollectSessions
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
     * @param string[] $ids
     * @param array    $data
     *
     * @return Sessions
     */
    public function collect(
        ?array $ids,
        ?array $data
    ) {
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

        return new Sessions($cursor);
    }
}