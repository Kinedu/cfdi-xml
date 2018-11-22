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

use Kinedu\CfdiXML\Node\Receptor;
use Kinedu\CfdiXML\Tests\Common\NodeTest;

class ReceptorTest extends NodeTest
{
    /** @var string */
    protected $nodeName = 'cfdi:Receptor';

    public function setUp()
    {
        $this->node = new Receptor([
            'Rfc' => 'XEXX010101000',
            'Nombre' => 'John Doe',
            'ResidenciaFiscal' => 'USA',
            'NumRegIdTrib' => '121585958',
            'UsoCFDI' => 'G03',
        ]);
    }
}
