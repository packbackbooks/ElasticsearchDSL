<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Packback\ElasticsearchDSL\SearchEndpoint;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Search sort dsl endpoint.
 */
class SortEndpoint extends AbstractSearchEndpoint
{
    /**
     * Endpoint name
     */
    const NAME = 'sort';

    /**
     * {@inheritdoc}
     */
    public function normalize($normalizer, ?string $format = null, array $context = []): \ArrayObject|array|string|int|float|bool|null
    {
        $output = [];

        foreach ($this->getAll() as $sort) {
            $output[] = $sort->toArray();
        }

        return $output;
    }
}
