# ![Kinedu](https://raw.githubusercontent.com/Kinedu/cfdi-xml/gh-pages/assets/img/logo.png)

[![Travis](https://img.shields.io/travis/Kinedu/cfdi-xml.svg?style=flat-square)](https://travis-ci.org/Kinedu/cfdi-xml)
[![StyleCI](https://styleci.io/repos/118186981/shield?branch=master)](https://styleci.io/repos/118186981)
[![Quality Score](https://img.shields.io/scrutinizer/g/Kinedu/cfdi-xml.svg?style=flat-square)](https://scrutinizer-ci.com/g/Kinedu/cfdi-xml)
[![Total Downloads](https://poser.pugx.org/kinedu/cfdi-xml/downloads?format=flat-square)](https://packagist.org/packages/kinedu/cfdi-xml)
[![License](https://img.shields.io/github/license/kinedu/cfdi-xml.svg?style=flat-square)](https://packagist.org/packages/kinedu/cfdi-xml)

## Instalación

Instalar el paquete mediante [Composer](https://getcomposer.org/).

```shell
composer require kinedu/cfdi-xml
```

## Uso

- [Factura](#factura)
    - [CFDI](#cfdi)
    - [Obtener XML](#obtener-xml)
    - [Guardar CFDI](#guardar-cfdi)
- [Nodos](#nodos)
    - [Relacionado](#relacionado)
    - [Emisor](#emisor)
    - [Receptor](#receptor)
    - [Impuestos](#impuestos)
    - [Concepto](#concepto)
    - [Parte](#parte)
    - [Información Aduanera](#información-aduanera)

### Factura

- [CFDI](#cfdi)
- [Obtener XML](#obtener-xml)
- [Guardar CFDI](#guardar-cfdi)

#### CFDI

```php
use Kinedu\CfdiXML\CFDI;

$key = 'AAA010101AAA.key.pem';
$cer = 'AAA010101AAA.cer.pem';

$cfdi = new CFDI([
    'Serie' => 'A',
    'Folio' => 'A0103',
    'Fecha' => '2018-02-01T10:00:00',
    'FormaPago' => '01',
    'NoCertificado' => '3000100000300023708',
    'SubTotal' => '4741.38',
    'Moneda' => 'MXN',
    'TipoCambio' => '1',
    'Total' => '5500.00',
    'TipoDeComprobante' => 'I',
    'MetodoPago' => 'PUE',
    'LugarExpedicion' => '64000',
], $key, $cer);
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Comprobante xmlns:cfdi="http://www.sat.gob.mx/cfd/3" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd" Version="3.3" Serie="A" Folio="A0103" Fecha="2018-02-01T10:00:00" FormaPago="01" NoCertificado="3000100000300023708" SubTotal="4741.38" Moneda="MXN" TipoCambio="1" Total="5500.00" TipoDeComprobante="I" MetodoPago="PUE" LugarExpedicion="64000"/>
```

</details>

[⬆️ Regresar al listado](#factura)

#### Obtener XML

```php
use Kinedu\CfdiXML\CFDI;

$key = file_get_contents('AAA010101AAA.key.pem');
$cer = file_get_contents('AAA010101AAA.cer.pem');

$cfdi = new CFDI([
    'Serie' => 'A',
    'Folio' => 'A0103',
    'Fecha' => '2018-02-01T10:00:00',
    'FormaPago' => '01',
    'NoCertificado' => '3000100000300023708',
    'SubTotal' => '4741.38',
    'Moneda' => 'MXN',
    'TipoCambio' => '1',
    'Total' => '5500.00',
    'TipoDeComprobante' => 'I',
    'MetodoPago' => 'PUE',
    'LugarExpedicion' => '64000',
], $key, $cer);

$cfdi->getXML();
```

[⬆️ Regresar al listado](#factura)

#### Guardar CFDI

```php
use Kinedu\CfdiXML\CFDI;

$key = 'AAA010101AAA.key.pem';
$cer = 'AAA010101AAA.cer.pem';

$cfdi = new CFDI([
    'Serie' => 'A',
    'Folio' => 'A0103',
    'Fecha' => '2018-02-01T10:00:00',
    'FormaPago' => '01',
    'NoCertificado' => '3000100000300023708',
    'SubTotal' => '4741.38',
    'Moneda' => 'MXN',
    'TipoCambio' => '1',
    'Total' => '5500.00',
    'TipoDeComprobante' => 'I',
    'MetodoPago' => 'PUE',
    'LugarExpedicion' => '64000',
], $key, $cer);

$cfdi->save('./A0103.xml');
```

### Nodos

- [Relacionado](#relacionado)
- [Emisor](#emisor)
- [Receptor](#receptor)
- [Impuestos](#impuestos)
- [Concepto](#concepto)
- [Parte](#parte)
- [Información Aduanera](#información-aduanera)
- [Timbre Fiscal Digital](#timbre-fiscal-digital)

#### Relacionado

En este nodo se debe expresar la información de los comprobantes fiscales relacionados con el que se ésta generando, se deben expresar tantos numeros de nodos de CfdiRelacionado, como comprobantes se requieran relacionar.

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Relacionado;

$cfdi = new CFDI(...);

$cfdi->add(new Relacionado([
    'UUID' => '5FB2822E-396D-4725-8521-CDC4BDD20CCF',
], [
    'TipoRelacion' => '01',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:CfdiRelacionados TipoRelacion="01">
    <cfdi:CfdiRelacionado UUID="5FB2822E-396D-4725-8521-CDC4BDD20CCF"/>
</cfdi:CfdiRelacionados>
```

</details>

[⬆️ Regresar al listado](#nodos)

#### Emisor

En este nodo se debe expresar la información del contribuyente que emite el comprobante fiscal.

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Emisor;

$cfdi = new CFDI(...);

$cfdi->add(new Emisor([
    'Rfc' => 'XAXX010101000',
    'Nombre' => 'John Doe',
    'RegimenFiscal' => '601',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Emisor Rfc="XAXX010101000" Nombre="John Doe" RegimenFiscal="601"/>
```

</details>

[⬆️ Regresar al listado](#nodos)

#### Receptor

En este nodo se debe expresar la información del contribuyente receptor del comprobante.

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Receptor;

$cfdi = new CFDI(...);

$cfdi->add(new Receptor([
    'Rfc' => 'XEXX010101000',
    'Nombre' => 'John Doe',
    'ResidenciaFiscal' => 'USA',
    'NumRegIdTrib' => '121585958',
    'UsoCFDI' => 'G03',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Receptor Rfc="XEXX010101000" Nombre="John Doe" ResidenciaFiscal="USA" NumRegIdTrib="121585958" UsoCFDI="G03"/>
```

</details>

[⬆️ Regresar al listado](#nodos)

#### Impuestos

##### Traslado

###### Traslado en comprobante

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CFDI\Node\Impuesto\Traslado;

$cfdi = new CFDI([...]);

$cfdi->add(new Traslado([
    'Impuesto' => '002',
    'TipoFactor' => 'Tasa',
    'TasaOCuota' => '0.160000',
    'Importe' => '4500',
], [], [
    'TotalImpuestosTrasladados' => '4500',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Impuestos TotalImpuestosTrasladados="4500">
    <cfdi:Traslados>
        <cfdi:Traslado Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="4500"/>
    </cfdi:Traslados>
</cfdi:Impuestos>
```

</details>

###### Traslado en concepto

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Concepto;
use Kinedu\CFDI\Node\Impuesto\Traslado;

$cfdi = new CFDI([...]);

$concepto = new Concepto([...]);

$concepto->add(new Traslado([
    'Base' => '4500',
    'Impuesto' => '002',
    'TipoFactor' => 'Tasa',
    'TasaOCuota' => '0.160000',
    'Importe' => '720',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Conceptos>
    <cfdi:Concepto>
        <cfdi:Impuestos>
            <cfdi:Traslados>
                <cfdi:Traslado Base="4500" Impuesto="002" TipoFactor="Tasa" TasaOCuota="0.160000" Importe="720"/>
            </cfdi:Traslados>
        </cfdi:Impuestos>
    </cfdi:Concepto>
</cfdi:Conceptos>
```

</details>

##### Retención

###### Retención en comprobante

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CFDI\Node\Impuesto\Retencion;

$cfdi = new CFDI([...]);

$cfdi->add(new Retencion([
    'Impuesto' => '002',
    'Importe' => '4500',
], [], [
    'TotalImpuestosRetenidos' => '4500',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Impuestos TotalImpuestosRetenidos="4500">
    <cfdi:Retenciones>
        <cfdi:Retencion Impuesto="002" Importe="4500"/>
    </cfdi:Retenciones>
</cfdi:Impuestos>
```

</details>

###### Retención en concepto

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Concepto;
use Kinedu\CFDI\Node\Impuesto\Retencion;

$cfdi = new CFDI([...]);

$concepto = new Concepto([...]);

$concepto->add(new Retencion([
    'Base' => '4500',
    'Impuesto' => '003',
    'TipoFactor' => 'Tasa',
    'TasaOCuota' => '0.530000',
    'Importe' => '2385',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Conceptos>
    <cfdi:Concepto>
        <cfdi:Impuestos>
            <cfdi:Retenciones>
                <cfdi:Retencion Base="4500" Impuesto="003" TipoFactor="Tasa" TasaOCuota="0.530000" Importe="2385"/>
            </cfdi:Retenciones>
        </cfdi:Impuestos>
    </cfdi:Concepto>
</cfdi:Conceptos>
```

</details>

#### Concepto

En este nodo se debe expresar la información detallada de un bien o servicio descrito en el comprobante.

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Concepto;

$cfdi = new CFDI(...);

$cfdi->add(new Concepto([
    'ClaveProdServ' => '10317331',
    'NoIdentificacion' => 'UT421511',
    'Cantidad' => '24',
    'ClaveUnidad' => 'H87',
    'Unidad' => 'Pieza',
    'Descripcion' => 'Arreglo de 24 tulipanes rosadas recién cortados',
    'ValorUnitario' => '56.00',
    'Importe' => '1344.00',
    'Descuento' => '10.00',
]));
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Conceptos>
    <cfdi:Concepto ClaveProdServ="60121001" NoIdentificacion="UT421510" Cantidad="5.555555" ClaveUnidad="KGM" Unidad="Kilo" ValorUnitario="I"/>
</cfdi:Conceptos>
```

</details>

[⬆️ Regresar al listado](#nodos)

#### Parte
En este nodo se pueden expresar las partes o componentes que integran la totalidad del concepto expresado en el comprobante fiscal digital por Internet.

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Parte;
use Kinedu\CfdiXML\Node\Concepto;

$cfdi = new CFDI(...);

$concepto = new Concepto([
    'ClaveProdServ' => '27113201',
    'NoIdentificacion' => 'UT421456',
    'Cantidad' => '1',
    'ClaveUnidad' => 'KT',
    'Unidad' => 'Kit',
    'Descripcion' => 'Kit de destornillador',
    'ValorUnitario' => '217.30',
    'Importe' => '217.30',
    'Descuento' => '0.00',
]);

$tornillo = new Parte([
    'ClaveProdServ' => '31161500',
    'NoIdentificacion' => 'UT367898',
    'Cantidad' => '34',
    'ClaveUnidad' => 'H87',
    'Unidad' => 'Pieza',
    'Descripcion' => 'Tornillo',
    'ValorUnitario' => '00.20',
    'Importe' => '6.80',
]);

$tornilloPerno = new Parte([
    'ClaveProdServ' => '31161501',
    'NoIdentificacion' => 'UT367899',
    'Cantidad' => '14',
    'ClaveUnidad' => 'H87',
    'Unidad' => 'Pieza',
    'Descripcion' => 'Tornillo de Perno',
    'ValorUnitario' => '00.75',
    'Importe' => '10.50',
]);

$destornillador = new Parte([
    'ClaveProdServ' => '27111701',
    'NoIdentificacion' => 'UT367900',
    'Cantidad' => '2',
    'ClaveUnidad' => 'H87',
    'Unidad' => 'Pieza',
    'Descripcion' => 'Destornillador',
    'ValorUnitario' => '100.00',
    'Importe' => '200.00',
]);

$concepto->add($tornillo);
$concepto->add($tornilloPerno);
$concepto->add($destornillador);

$cfdi->add($concepto);
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Conceptos>
    <cfdi:Concepto ClaveProdServ="27113201" NoIdentificacion="UT421456" Cantidad="1" ClaveUnidad="KT" Unidad="Kit" Descripcion="Kit de destornillador" ValorUnitario="217.30" Importe="217.30" Descuento="0.00">
        <cfdi:Parte ClaveProdServ="31161500" NoIdentificacion="UT367898" Cantidad="34" ClaveUnidad="H87" Unidad="Pieza" Descripcion="Tornillo" ValorUnitario="00.20" Importe="6.80"/>
        <cfdi:Parte ClaveProdServ="31161501" NoIdentificacion="UT367899" Cantidad="14" ClaveUnidad="H87" Unidad="Pieza" Descripcion="Tornillo de Perno" ValorUnitario="00.75" Importe="10.50"/>
        <cfdi:Parte ClaveProdServ="27111701" NoIdentificacion="UT367900" Cantidad="2" ClaveUnidad="H87" Unidad="Pieza" Descripcion="Destornillador" ValorUnitario="100.00" Importe="200.00"/>
    </cfdi:Concepto>
</cfdi:Conceptos>
```

</details>

[⬆️ Regresar al listado](#nodos)

#### Información Aduanera

En este nodo se debe expresar la información aduanera correspondiente a cada concepto cuando se trate de ventas de primera mano de mercancías importadas.

```php
use Kinedu\CfdiXML\CFDI;
use Kinedu\CfdiXML\Node\Concepto;
use Kinedu\CfdiXML\Node\InformacionAduanera;

$cfdi = new CFDI(...);

$concepto = new Concepto(...);

$concepto->add(new InformacionAduanera([
    'NumeroPedimento' => '00 00 0000 0000000',
]));

$cfdi->add($concepto);
```

<details>
<summary>Ver Resultado</summary>

```xml
<cfdi:Conceptos>
    <cfdi:Concepto ClaveProdServ="60121001" NoIdentificacion="UT421510" Cantidad="5.555555" ClaveUnidad="KGM" Unidad="Kilo" ValorUnitario="I">
        <cfdi:InformacionAduanera NumeroPedimento="00 00 0000 0000000"/>
    </cfdi:Concepto>
</cfdi:Conceptos>
```

</details>

[⬆️ Regresar al listado](#nodos)

## Licencia

CFDI XML esta bajo la Licencia MIT, si quieres saber más al respecto puedes ver el archivo de [Licencia](LICENSE) que se encuentra en este mismo repositorio.
