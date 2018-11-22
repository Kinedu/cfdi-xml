<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Common\Complemento;

use Kinedu\CfdiXML\Common\Complemento;

class Pago extends Complemento
{
    /** @var string */
    protected $parentNodeName = 'pago10:Pagos';

    /** @var string */
    protected $nodeName = 'pago10:Pago';
}
