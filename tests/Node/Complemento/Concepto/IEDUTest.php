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

use Kinedu\CfdiXML\Tests\Common\NodeTest;
use Kinedu\CfdiXML\Common\Complemento\IEDU;

class IEDUTest extends NodeTest
{
    /** @var string */
    protected $nodeName = 'iedu:instEducativas';

    /** @var string */
    protected $parentNodeName = 'cfdi:ComplementoConcepto';

    public function setUp()
    {
        $this->node = new IEDU();
    }
}
