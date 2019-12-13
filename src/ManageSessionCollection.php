<?php

namespace Yosmy;

use Yosmy\Mongo\ManageCollection;

/**
 * @di\service({
 *     private: true
 * })
 */
class ManageSessionCollection extends ManageCollection
{
    /**
     * @di\arguments({
     *     uri: "%mongo_uri%",
     *     db:  "%mongo_db%"
     * })
     *
     * @param string $uri
     * @param string $db
     */
    public function __construct(
        string $uri,
        string $db
    ) {
        parent::__construct(
            $uri,
            $db,
            'yosmy_sessions',
            [
                'typeMap' => array(
                    'root' => Session::class,
                ),
            ]
        );
    }
}
