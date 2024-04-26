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

use Packback\ElasticsearchDSL\Aggregation\Pipeline\MinBucketAggregation;

/**
 * Unit test for min bucket aggregation.
 */
class MinBucketAggregationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests toArray method.
     */
    public function testToArray()
    {
        $aggregation = new MinBucketAggregation('acme', 'test');

        $expected = [
            'min_bucket' => [
                'buckets_path' => 'test',
            ],
        ];

        $this->assertEquals($expected, $aggregation->toArray());
    }
}
