<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ONGR\ElasticsearchDSL\SearchEndpoint;

use ONGR\ElasticsearchDSL\Aggregation\AbstractAggregation;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Search aggregations dsl endpoint.
 */
class AggregationsEndpoint extends AbstractSearchEndpoint
{
    /**
     * Endpoint name
     */
    const NAME = 'aggregations';

    /**
     * {@inheritdoc}
     */
    public function normalize($normalizer, ?string $format = null, array $context = []): \ArrayObject|array|string|int|float|bool|null
    {
        $output = [];
        if (count($this->getAll()) > 0) {
            /** @var AbstractAggregation $aggregation */
            foreach ($this->getAll() as $aggregation) {
                $output[$aggregation->getName()] = $aggregation->toArray();
            }
        }

        return $output;
    }
}
