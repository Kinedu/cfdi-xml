<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Tests;

use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Emisor;
use PHPUnit\Framework\TestCase;

class CFDITest extends TestCase
{
    public function testGetCadenaOriginal()
    {
        $this->assertEquals(
            $this->createCFDI()->getCadenaOriginal(),
            $this->getFileContent('CadenaOriginal')
        );
    }

    public function testGetSello()
    {
        $this->assertEquals(
            $this->createCFDI()->getSello(),
            $this->getFileContent('Sello')
        );
    }

    public function testGetCertificado()
    {
        $this->assertEquals(
            $this->createCFDI()->getCertificado(),
            $this->getFileContent('Certificado')
        );
    }

    protected function createCFDI()
    {
        $key = file_get_contents('./tests/CSD/CSD01_AAA010101AAA.key.pem');
        $cer = file_get_contents('./tests/CSD/CSD01_AAA010101AAA.cer.pem');

        return new CFDI([
            'Serie' => 'A',
            'Folio' => 'A0103',
            'Fecha' => '2018-02-02T11:36:17',
            'FormaPago' => '01',
            'NoCertificado' => '30001000000300023708',
            'SubTotal' => '4741.38',
            'Moneda' => 'MXN',
            'TipoCambio' => '1',
            'Total' => '5500.00',
            'TipoDeComprobante' => 'I',
            'MetodoPago' => 'PUE',
            'LugarExpedicion' => '64000',
        ], $key, $cer);
    }

    protected function getFileContent(string $file)
    {
        return file_get_contents("./tests/Files/{$file}.txt");
    }
}
