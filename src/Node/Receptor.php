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

class Receptor extends Node
{
    /**
     * Node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Receptor';

    /**
     * Node valid attributes.
     *
     * @var array
     */
    protected $validAttributes = [
        'Rfc',
        'Nombre',
        'ResidenciaFiscal',
        'NumRegIdTrib',
        'UsoCFDI',
    ];
}
