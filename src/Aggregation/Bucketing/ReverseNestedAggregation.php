<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Packback\ElasticsearchDSL\Aggregation\Bucketing;

use Packback\ElasticsearchDSL\Aggregation\AbstractAggregation;
use Packback\ElasticsearchDSL\Aggregation\Type\BucketingTrait;

/**
 * Class representing ReverseNestedAggregation.
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations-bucket-reverse-nested-aggregation.html
 */
class ReverseNestedAggregation extends AbstractAggregation
{
    use BucketingTrait;

    /**
     * @var string
     */
    private $path;

    /**
     * Inner aggregations container init.
     *
     * @param string $name
     * @param string $path
     */
    public function __construct($name, $path = null)
    {
        parent::__construct($name);

        $this->setPath($path);
    }

    /**
     * Return path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Sets path.
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'reverse_nested';
    }

    /**
     * {@inheritdoc}
     */
    public function getArray()
    {
        $output = new \stdClass();
        if ($this->getPath()) {
            $output = ['path' => $this->getPath()];
        }

        return $output;
    }
}
