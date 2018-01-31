<?php

/*
 * This file is part of the cfdi-xml project.
 *
 * (c) Kinedu
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Kinedu\CfdiXML;

use Kinedu\CfdiXML\Node\Comprobante;
use Kinedu\CfdiXML\Common\Node;
use Kinedu\CfdiXslt\Retrieve;
use XSLTProcessor;
use DOMDocument;

class CFDI
{
    /**
     * CFDI version.
     *
     * @var string
     */
    protected $version = '3.3';

    /**
     * Comprobante instance.
     *
     * @var \Kinedu\CfdiXML\Node\Comprobante
     */
    protected $comprobante;

    /**
     * Create a new cfdi instance.
     *
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->comprobante = new Comprobante($data, $this->version);
    }

    /**
     * Add new node to comprobante instance.
     *
     * @param \Kinedu\CfdiXML\Common\Node $node
     *
     * @return void
     */
    public function add(Node $node)
    {
        $this->comprobante->add($node);
    }

    /**
     * @return void
     */
    public static function downloadXslt()
    {
        $xslt = new Retrieve();
        $xslt->download('./xslt/');
    }
}
