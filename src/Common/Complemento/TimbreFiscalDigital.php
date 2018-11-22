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

class TimbreFiscalDigital extends Complemento
{
    /**
     * The node name.
     *
     * @var string
     */
    protected $nodeName = 'tfd:TimbreFiscalDigital';

    /**
     * Create a new timbre fiscal digital instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $data = array_merge($this->attributes(), $data);

        parent::__construct($data);
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'xmlns:tfd' => 'http://www.sat.gob.mx/TimbreFiscalDigital',
            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            'xsi:schemaLocation' => 'http://www.sat.gob.mx/TimbreFiscalDigital http://www.sat.gob.mx/sitio_internet/cfd/TimbreFiscalDigital/TimbreFiscalDigitalv11.xsd',
        ];
    }
}
