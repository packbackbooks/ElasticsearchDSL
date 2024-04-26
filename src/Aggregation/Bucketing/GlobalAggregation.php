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
 * Class representing GlobalAggregation.
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations-bucket-global-aggregation.html
 */
class GlobalAggregation extends AbstractAggregation
{
    use BucketingTrait;

    /**
     * {@inheritdoc}
     */
    public function setField($field)
    {
        throw new \LogicException("Global aggregation, doesn't support `field` parameter");
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'global';
    }

    /**
     * {@inheritdoc}
     */
    public function getArray()
    {
        return new \stdClass();
    }
}
