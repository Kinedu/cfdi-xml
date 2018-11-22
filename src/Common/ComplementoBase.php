<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML\Common;

class ComplementoBase extends Node
{
    /** @var string */
    const SAT_URL = 'http://www.sat.gob.mx/';

    /** @var string */
    const SCHEMA_URL = 'http://www.sat.gob.mx/sitio_internet/cfd/%s/%s.xsd';

    /** @var string */
    protected $namespace;

    /** @var string */
    protected $schemaDefinition;

    /** @var bool */
    protected $globalSchemaLocation = true;

    public function getNamespace(): string
    {
        return self::SAT_URL.$this->namespace;
    }

    public function getSchemaLocation(): string
    {
        $schemaLocation = sprintf(
            self::SCHEMA_URL,
            $this->namespace,
            $this->schemaDefinition
        );

        return "{$this->getNamespace()} $schemaLocation";
    }
}
