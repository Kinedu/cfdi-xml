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

class ComplementoTest extends TestCase
{
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

    public function testParentNodeName()
    {
        $this->assertEquals(
            $this->node->getParentNodeName(),
            'cfdi:Complemento'
        );
    }
}
