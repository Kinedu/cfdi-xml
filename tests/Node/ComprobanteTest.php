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

use Kinedu\CfdiXML\Node\Comprobante;
use Kinedu\CfdiXML\Tests\Common\NodeTest;

class ComprobanteTest extends NodeTest
{
    /** @var string */
    protected $nodeName = 'cfdi:Comprobante';

    public function setUp(): void
    {
        $this->node = new Comprobante([
            'Serie' => 'A',
            'Folio' => 'A0103',
            'Fecha' => '2017-10-30T12:09:17',
            'FormaPago' => '04',
            'CondicionesDePago' => '3 meses',
            'Moneda' => 'MXN',
            'TipoCambio' => '1',
            'TipoDeComprobante' => 'I',
            'MetodoPago' => 'PUE',
            'LugarExpedicion' => '64000',
        ], '3.3');
    }
}
