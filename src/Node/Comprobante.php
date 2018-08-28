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

class Comprobante extends Node
{
    /**
     * CFDI version.
     *
     * @var string
     */
    protected $version;

    /**
     * Node name.
     *
     * @var string
     */
    protected $nodeName = 'cfdi:Comprobante';

    /**
     * Create a new comprobante instance.
     *
     * @param array $data
     * @param string $version
     */
    public function __construct(array $data, string $version)
    {
        $this->version = $version;

        $data = array_merge($this->attributes(), $data);

        parent::__construct($data);
    }

    /**
     *
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'xmlns:cfdi' => 'http://www.sat.gob.mx/cfd/3',
            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            'xsi:schemaLocation' => 'http://www.sat.gob.mx/cfd/3 http://www.sat.gob.mx/sitio_internet/cfd/3/cfdv33.xsd',
            'Version' => $this->version,
        ];
    }
}
