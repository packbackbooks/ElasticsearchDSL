<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Packback\ElasticsearchDSL\Tests\Unit\Unit\SearchEndpoint;

use Packback\ElasticsearchDSL\Aggregation\Bucketing\MissingAggregation;
use Packback\ElasticsearchDSL\SearchEndpoint\AggregationsEndpoint;

/**
 * Class AggregationsEndpointTest.
 */
class AggregationsEndpointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests constructor.
     */
    public function testItCanBeInstantiated()
    {
        $this->assertInstanceOf(
            'Packback\ElasticsearchDSL\SearchEndpoint\AggregationsEndpoint',
            new AggregationsEndpoint()
        );
    }

    /**
     * Tests if endpoint returns builders.
     */
    public function testEndpointGetter()
    {
        $aggName = 'acme_agg';
        $agg = new MissingAggregation('acme');
        $endpoint = new AggregationsEndpoint();
        $endpoint->add($agg, $aggName);
        $builders = $endpoint->getAll();

        $this->assertCount(1, $builders);
        $this->assertSame($agg, $builders[$aggName]);
    }
}
