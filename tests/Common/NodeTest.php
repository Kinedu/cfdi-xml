<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests\Common;

use PHPUnit\Framework\TestCase;

abstract class NodeTest extends TestCase
{
    /**
     * The instance of the node.
     *
     * @var \Kinedu\CfdiXML\Common\Node
     */
    protected $node;

    /**
     * The node name.
     *
     * @var string
     */
    protected $nodeName;

    public function testNodeName()
    {
        $this->assertEquals(
            $this->node->getNodeName(),
            $this->nodeName
        );
    }
}
