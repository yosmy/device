<?php

namespace Yosmy;

use MongoDB\Model\BSONDocument;

class Session extends BSONDocument
{
    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->offsetGet('id');
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->offsetGet('data');
    }

    /**
     * {@inheritdoc}
     */
    public function bsonUnserialize(array $data)
    {
        $data['id'] = $data['_id'];
        unset($data['_id']);

        $data['data'] = json_decode(json_encode($data['data']), true);

        parent::bsonUnserialize($data);
    }
}