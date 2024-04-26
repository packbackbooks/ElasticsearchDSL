<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Packback\ElasticsearchDSL\Tests\Unit\Aggregation\Pipeline;

use Packback\ElasticsearchDSL\Aggregation\Pipeline\SerialDifferencingAggregation;

/**
 * Unit test for serial differencing aggregation.
 */
class SerialDifferencingAggregationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests toArray method.
     */
    public function testToArray()
    {
        $aggregation = new SerialDifferencingAggregation('acme', 'test');
        $aggregation->addParameter('lag', '7');

        $expected = [
            'serial_diff' => [
                'buckets_path' => 'test',
                'lag' => '7'
            ],
        ];

        $this->assertEquals($expected, $aggregation->toArray());
    }
}
