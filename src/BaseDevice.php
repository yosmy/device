<?php

namespace Yosmy;

use Yosmy\Mongo;

class BaseDevice extends Mongo\Document implements Device
{
    /**
     * @param string $id
     * @param array  $data
     */
    public function __construct(
        string $id,
        array $data
    ) {
        parent::__construct([
            '_id' => $id,
            'data' => $data
        ]);
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->offsetGet('_id');
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
        $data['data'] = Mongo\NormalizeStd::normalize($data['data']);

        parent::bsonUnserialize($data);
    }

    /**
     * {@inheritDoc}
     */
    public function jsonSerialize(): object
    {
        $data = parent::jsonSerialize();

        $data->id = $data->_id;

        unset($data->_id);

        return $data;
    }
}