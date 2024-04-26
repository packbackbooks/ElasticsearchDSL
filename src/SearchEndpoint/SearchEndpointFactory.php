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

/**
 * Factory for search endpoints.
 */
class SearchEndpointFactory
{
    /**
     * @var array Holds namespaces for endpoints.
     */
    private static $endpoints = [
        'query' => 'Packback\ElasticsearchDSL\SearchEndpoint\QueryEndpoint',
        'post_filter' => 'Packback\ElasticsearchDSL\SearchEndpoint\PostFilterEndpoint',
        'sort' => 'Packback\ElasticsearchDSL\SearchEndpoint\SortEndpoint',
        'highlight' => 'Packback\ElasticsearchDSL\SearchEndpoint\HighlightEndpoint',
        'aggregations' => 'Packback\ElasticsearchDSL\SearchEndpoint\AggregationsEndpoint',
        'suggest' => 'Packback\ElasticsearchDSL\SearchEndpoint\SuggestEndpoint',
        'inner_hits' => 'Packback\ElasticsearchDSL\SearchEndpoint\InnerHitsEndpoint',
    ];

    /**
     * Returns a search endpoint instance.
     *
     * @param string $type Type of endpoint.
     *
     * @return SearchEndpointInterface
     *
     * @throws \RuntimeException Endpoint does not exist.
     */
    public static function get($type)
    {
        if (!array_key_exists($type, self::$endpoints)) {
            throw new \RuntimeException('Endpoint does not exist.');
        }

        return new self::$endpoints[$type]();
    }
}
