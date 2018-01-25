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

use Kinedu\CfdiXML\Node\Impuesto\Impuesto;
use PHPUnit\Framework\TestCase;

class ImpuestoTest extends TestCase
{
    public function setUp()
    {
        $this->node = new Impuesto();
    }

    public function testWrapperNodeName()
    {
        $this->assertEquals(
            $this->node->getWrapperNodeName(),
            'cfdi:Impuestos'
        );
    }
}
