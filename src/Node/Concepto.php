<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Node;

use Kinedu\CfdiXML\Common\Node;

class Concepto extends Node
{
    /** @var string */
    protected $parentNodeName = 'cfdi:Conceptos';

    /** @var string */
    protected $nodeName = 'cfdi:Concepto';
}
