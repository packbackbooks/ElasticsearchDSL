<?php

namespace Packback\ElasticsearchDSL\Tests\Unit\InnerHit;

use Packback\ElasticsearchDSL\InnerHit\ParentInnerHit;
use Packback\ElasticsearchDSL\Query\TermLevel\TermQuery;
use Packback\ElasticsearchDSL\Search;

class ParentInnerHitTest extends \PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
        $query = new TermQuery('foo', 'bar');
        $search = new Search();
        $search->addQuery($query);


        $hit = new ParentInnerHit('test', 'acme', $search);
        $expected = [
            'type' => [
                'acme' => [
                    'query' => $query->toArray(),
                ],
            ],
        ];
        $this->assertEquals($expected, $hit->toArray());
    }
}
