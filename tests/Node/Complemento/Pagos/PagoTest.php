<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests\Node\Complemento\Pagos;

use Kinedu\CfdiXML\Tests\Common\NodeTest;
use Kinedu\CfdiXML\Common\Complemento\Pago;

class PagoTest extends NodeTest
{
    /** @var string */
    protected $parentNodeName = 'pago10:Pagos';

    /** @var string */
    protected $nodeName = 'pago10:Pago';

    public function setUp(): void
    {
        $this->node = new Pago([
            'FechaPago' => '2018-01-01T12:00:00',
            'FormaDePagoP' => '02',
            'MonedaP' => 'MXN',
            'Monto' => '5000',
        ]);
    }
}
