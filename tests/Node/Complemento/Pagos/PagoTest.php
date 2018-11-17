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
use Kinedu\CfdiXML\Node\Complemento\Pagos\Pago;

class PagoTest extends NodeTest
{
    /**
     * Define the parent node name.
     *
     * @var string
     */
    protected $parentNodeName = 'pago10:Pagos';

    /**
     * Node name.
     *
     * @var string
     */
    protected $nodeName = 'pago10:Pago';

    public function setUp()
    {
        $this->node = new Pago([
            'FechaPago' => '2018-01-01T12:00:00',
            'FormaDePagoP' => '02',
            'MonedaP' => 'MXN',
            'Monto' => '5000',
        ]);
    }
}
