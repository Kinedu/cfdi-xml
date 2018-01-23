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

use Kinedu\CfdiXML\Tests\Common\NodeTest;
use Kinedu\CfdiXML\Node\Emisor;

class EmisorTest extends NodeTest
{
    /**
     * The node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Emisor';

    public function setUp()
    {
        $this->node = new Emisor();
    }
}
