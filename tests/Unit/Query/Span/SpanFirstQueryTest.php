<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Packback\ElasticsearchDSL\Tests\Unit\Query\Span;

use Packback\ElasticsearchDSL\Query\Span\SpanFirstQuery;

/**
 * Unit test for SpanFirstQuery.
 */
class SpanFirstQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests for toArray().
     */
    public function testToArray()
    {
        $mock = $this->getMockBuilder('Packback\ElasticsearchDSL\Query\Span\SpanQueryInterface')->getMock();
        $mock
            ->expects($this->once())
            ->method('toArray')
            ->willReturn(['span_term' => ['user' => 'bob']]);

        $query = new SpanFirstQuery($mock, 5);
        $result = [
            'span_first' => [
                'match' => [
                    'span_term' => ['user' => 'bob'],
                ],
                'end' => 5,
            ],
        ];
        $this->assertEquals($result, $query->toArray());
    }
}
