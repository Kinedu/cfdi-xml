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
use Kinedu\CfdiXML\Node\Impuesto\Retencion;

class RetencionTest extends NodeTest
{
    /** @var string */
    protected $parentNodeName = 'cfdi:Retenciones';

    /** @var string */
    protected $nodeName = 'cfdi:Retencion';

    public function setUp(): void
    {
        $this->node = new Retencion();
    }
}
