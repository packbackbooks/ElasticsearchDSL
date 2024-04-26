<?php

namespace Packback\ElasticsearchDSL\Aggregation\Pipeline;

use Packback\ElasticsearchDSL\Aggregation\AbstractAggregation;
use Packback\ElasticsearchDSL\Aggregation\Type\MetricTrait;

abstract class AbstractPipelineAggregation extends AbstractAggregation
{
    use MetricTrait;

    /**
     * @var string
     */
    private $bucketsPath;

    /**
     * @param string $name
     * @param $bucketsPath
     */
    public function __construct($name, $bucketsPath)
    {
        parent::__construct($name);
        $this->setBucketsPath($bucketsPath);
    }

    /**
     * @return string
     */
    public function getBucketsPath()
    {
        return $this->bucketsPath;
    }

    /**
     * @param string $bucketsPath
     */
    public function setBucketsPath($bucketsPath)
    {
        $this->bucketsPath = $bucketsPath;
    }

    /**
     * {@inheritdoc}
     */
    public function getArray()
    {
        return ['buckets_path' => $this->getBucketsPath()];
    }
}
