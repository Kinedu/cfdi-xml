<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests\Node\Complemento\Pagos;

use Kinedu\CfdiXML\Tests\Common\NodeTest;
use Kinedu\CfdiXML\Node\Complemento\Pagos\DoctoRelacionado;

class DoctoRelacionadoTest extends NodeTest
{
    /** @var string */
    protected $nodeName = 'pago10:DoctoRelacionado';

    public function setUp(): void
    {
        $this->node = new DoctoRelacionado([
            'IdDocumento' => '307d70bc-7007-4bed-9b54-b3f57421f2c4',
            'Serie' => 'A',
            'Folio' => '12345',
            'MonedaDR' => 'MXN',
            'MetodoDePagoDR' => 'PPD',
            'NumParcialidad' => '1',
            'ImpSaldoAnt' => '8000',
            'ImpPagado' => '8000',
            'ImpSaldoInsoluto' => '0',
        ]);
    }
}
