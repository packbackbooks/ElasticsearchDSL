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
use Packback\ElasticsearchDSL\BuilderInterface;

/**
 * Class representing FilterAggregation.
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations-bucket-filter-aggregation.html
 */
class FilterAggregation extends AbstractAggregation
{
    use BucketingTrait;

    /**
     * @var BuilderInterface
     */
    protected $filter;

    /**
     * Inner aggregations container init.
     *
     * @param string           $name
     * @param BuilderInterface $filter
     */
    public function __construct($name, BuilderInterface $filter = null)
    {
        parent::__construct($name);

        if ($filter !== null) {
            $this->setFilter($filter);
        }
    }

    /**
     * Sets a filter.
     *
     * @param BuilderInterface $filter
     */
    public function setFilter(BuilderInterface $filter)
    {
        $this->filter = $filter;
    }

    /**
     * Returns a filter.
     *
     * @return BuilderInterface
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * {@inheritdoc}
     */
    public function setField($field)
    {
        throw new \LogicException("Filter aggregation, doesn't support `field` parameter");
    }

    /**
     * {@inheritdoc}
     */
    public function getArray()
    {
        if (!$this->filter) {
            throw new \LogicException("Filter aggregation `{$this->getName()}` has no filter added");
        }

        return $this->getFilter()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'filter';
    }
}
