<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests\Node\Complemento;

use Kinedu\CfdiXML\Tests\Common\NodeTest;
use Kinedu\CfdiXML\Common\Complemento\TimbreFiscalDigital;

class TimbreFiscalDigitalTest extends NodeTest
{
    /** @var string */
    protected $nodeName = 'tfd:TimbreFiscalDigital';

    public function setUp()
    {
        $this->node = new TimbreFiscalDigital([
            'Version' => '1.1',
            'UUID' => '1968FDDE-077E-11E8-BA89-0ED5F89F718B',
            'FechaTimbrado' => '2018-02-01T12:30:00',
            'RfcProvCertif' => 'XEXX010101000',
        ]);
    }
}
