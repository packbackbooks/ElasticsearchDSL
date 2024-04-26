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
 * Search post filter dsl endpoint.
 */
class PostFilterEndpoint extends QueryEndpoint
{
    /**
     * Endpoint name
     */
    const NAME = 'post_filter';

    /**
     * {@inheritdoc}
     */
    public function normalize($normalizer, ?string $format = null, array $context = []): \ArrayObject|array|string|int|float|bool|null
    {
        if (!$this->getBool()) {
            return null;
        }

        return $this->getBool()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrder()
    {
        return 1;
    }
}
