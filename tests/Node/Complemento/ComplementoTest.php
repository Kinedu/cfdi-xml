<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests\Node\Complemento;

use PHPUnit\Framework\TestCase;
use Kinedu\CfdiXML\Node\Complemento\Complemento;

abstract class ComplementoTest extends TestCase
{
    /**
     * Define the parent node name.
     *
     * @var string
     */
    protected $wrapperNodeName = 'cfdi:Complemento';

    /**
     * The node name.
     *
     * @var string
     */
    protected $node;

    public function setUp()
    {
        $this->node = new Complemento();
    }

    public function testWrapperNodeName()
    {
        $this->assertEquals(
            $this->node->getWrapperNodeName(),
            $this->wrapperNodeName
        );
    }
}
