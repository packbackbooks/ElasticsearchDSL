<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Packback\ElasticsearchDSL\Tests\Unit;

use Packback\ElasticsearchDSL\Query\TermLevel\ExistsQuery;
use Packback\ElasticsearchDSL\Query\TermLevel\TermQuery;
use Packback\ElasticsearchDSL\Search;
use Packback\ElasticsearchDSL\Sort\FieldSort;
use Packback\ElasticsearchDSL\Suggest\Suggest;

/**
 * Test for Search.
 */
class SearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests Search constructor.
     */
    public function testItCanBeInstantiated()
    {
        $this->assertInstanceOf('Packback\ElasticsearchDSL\Search', new Search());
    }

    public function testScrollUriParameter()
    {
        $search = new Search();
        $search->setScroll('5m');

        $this->assertArrayHasKey('scroll', $search->getUriParams());
    }
}
