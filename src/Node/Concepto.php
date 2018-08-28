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
    /**
     * Parent node name.
     *
     * @var string
     */
    protected $parentNodeName = 'cfdi:Conceptos';

    /**
     * Define the node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Concepto';

    /**
     * Node valid attributes.
     *
     * @var array
     */
    protected $validAttributes = [
        'Version',
        'Serie',
        'Folio',
        'Fecha',
        'Sello',
        'FormaPago',
        'NoCertificado',
        'Certificado',
        'CondicionesDePago',
        'SubTotal',
        'Descuento',
        'Moneda',
        'TipoCambio',
        'Total',
        'TipoDeComprobante',
        'MetodoPago',
        'LugarExpedicion',
        'Confirmacion',
    ];
}
