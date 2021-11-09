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

use PHPUnit\Framework\TestCase;
use Kinedu\CfdiXML\Node\Impuesto\Impuesto;

class ImpuestoTest extends TestCase
{
    /** @var string */
    protected $wrapperNodeName = 'cfdi:Impuestos';

    public function setUp(): void
    {
        $this->node = new Impuesto();
    }

    public function testWrapperNodeName()
    {
        $this->assertEquals(
            $this->node->getWrapperNodeName(),
            $this->wrapperNodeName
        );
    }
}
