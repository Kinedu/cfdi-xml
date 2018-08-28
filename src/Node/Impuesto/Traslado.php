<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Node\Impuesto;

class Traslado extends Impuesto
{
    /**
     * Parent node name.
     *
     * @var string
     */
    protected $parentNodeName = 'cfdi:Traslados';

    /**
     * Node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Traslado';

    /**
     * Node valid attributes.
     *
     * @var array
     */
    protected $validAttributes = [
        'Base',
        'Impuesto',
        'TipoFactor',
        'TasaOCuota',
        'Importe',
    ];
}
