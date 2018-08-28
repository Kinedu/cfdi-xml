<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests\Node\Impuesto;

use Kinedu\CfdiXML\Tests\Common\NodeTest;
use Kinedu\CfdiXML\Node\Impuesto\Traslado;

class TrasladoTest extends NodeTest
{
    /**
     * The parent node name.
     *
     * @var string
     */
    protected $parentNodeName = 'cfdi:Traslados';

    /**
     * The node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Traslado';

    public function setUp()
    {
        $this->node = new Traslado();
    }

    public function testTrasladoParentNodeName()
    {
        $this->assertEquals(
            $this->node->getParentNodeName(),
            'cfdi:Traslados'
        );
    }
}
