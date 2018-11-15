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

use Kinedu\CfdiXML\Node\Relacionado;
use Kinedu\CfdiXML\Tests\Common\NodeTest;

class RelacionadoTest extends NodeTest
{
    /**
     * The node name.
     *
     * @var string
     */
    protected $parentNodeName = 'cfdi:CfdiRelacionados';

    /**
     * The node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:CfdiRelacionado';

    public function setUp()
    {
        $this->node = new Relacionado([
            'UUID' => '5FB2822E-396D-4725-8521-CDC4BDD20CCF',
        ], [
            'TipoRelacion' => '01',
        ]);
    }
}
