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

use Kinedu\CfdiXML\Node\Emisor;
use Kinedu\CfdiXML\Tests\Common\NodeTest;

class EmisorTest extends NodeTest
{
    /** @var string */
    protected $nodeName = 'cfdi:Emisor';

    public function setUp(): void
    {
        $this->node = new Emisor([
            'Rfc' => 'XAXX010101000',
            'Nombre' => 'John Doe',
            'RegimenFiscal' => '601',
        ]);
    }
}
