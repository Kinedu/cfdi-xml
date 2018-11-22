<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Node\Complemento\Pagos;

use Kinedu\CfdiXML\Node\Complemento\Complemento;

class Pago extends Complemento
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
}