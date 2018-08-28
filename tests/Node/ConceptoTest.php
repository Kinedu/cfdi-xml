<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests\Node;

use Kinedu\CfdiXML\Node\Concepto;
use Kinedu\CfdiXML\Tests\Common\NodeTest;

class ConceptoTest extends NodeTest
{
    /**
     * The parent node name.
     *
     * @var string
     */
    protected $parentNodeName = 'cfdi:Conceptos';

    /**
     * The node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Concepto';

    public function setUp()
    {
        $this->node = new Concepto([
            'ClaveProdServ' => '60121001',
            'NoIdentificacion' => 'UT421510',
            'Cantidad' => '5.555555',
            'ClaveUnidad' => 'KGM',
            'Unidad' => 'Kilo',
            'ValorUnitario' => 'I',
        ]);
    }

    public function testConceptoParentNodeName()
    {
        $this->assertEquals(
            $this->node->getParentNodeName(),
            'cfdi:Conceptos'
        );
    }
}
