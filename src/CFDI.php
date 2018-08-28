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

use DOMDocument;
use XSLTProcessor;
use Kinedu\CfdiXML\Common\Node;
use Kinedu\CfdiXML\Node\Comprobante;

class CFDI
{
    /**
     * SAT XSL endpoint.
     *
     * @var string
     */
    const XSL_ENDPOINT = 'http://www.sat.gob.mx/sitio_internet/cfd/3/cadenaoriginal_3_3/cadenaoriginal_3_3.xslt';

    /**
     * CFDI version.
     *
     * @var string
     */
    protected $version = '3.3';

    /**
     * CSD key.
     *
     * @var string
     */
    protected $key;

    /**
     * CSD cer.
     *
     * @var string
     */
    protected $cer;

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
     * @param string $key
     * @param string $cer
     */
    public function __construct(array $data, string $key, string $cer)
    {
        $this->comprobante = new Comprobante($data, $this->version);

        $this->key = $key;
        $this->cer = $cer;
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
     * Gets the original string.
     *
     * @return string
     */
    public function getCadenaOriginal(): string
    {
        $xsl = new DOMDocument();
        $xsl->load($this->getXSL());

        $xslt = new XSLTProcessor();
        @$xslt->importStyleSheet($xsl);

        $xml = new DOMDocument();
        $xml->loadXML($this->comprobante->getDocument()->saveXML());

        return (string) $xslt->transformToXml($xml);
    }

    /**
     * Get sello.
     *
     * @return string
     */
    public function getSello(): string
    {
        $pkey = openssl_get_privatekey($this->key);
        openssl_sign(@$this->getCadenaOriginal(), $signature, $pkey, OPENSSL_ALGO_SHA256);
        openssl_free_key($pkey);
        return base64_encode($signature);
    }

    /**
     * Put sello.
     *
     * @return void
     */
    protected function putSello()
    {
        $this->comprobante->setAttr(
            $this->comprobante->getElement(),
            [
                'Sello' => $this->getSello(),
            ]
        );
    }

    /**
     * Get certificado.
     *
     * @return string
     */
    public function getCertificado(): string
    {
        $cer = preg_replace('/(-+[^-]+-+)/', '', $this->cer);
        $cer = preg_replace('/\s+/', '', $cer);
        return $cer;
    }

    /**
     * Put certificado.
     *
     * @return void
     */
    protected function putCertificado()
    {
        $this->comprobante->setAttr(
            $this->comprobante->getElement(),
            [
                'Certificado' => $this->getCertificado(),
            ]
        );
    }

    /**
     * Returns the xml with the stamp and certificate attributes.
     *
     * @return DOMDocument
     */
    protected function xml(): DOMDocument
    {
        $this->putSello();
        $this->putCertificado();
        return $this->comprobante->getDocument();
    }

    /**
     * Get the xml.
     *
     * @return string
     */
    public function getXML(): string
    {
        return $this->xml()->saveXML();
    }

    /**
     * @param string $filename
     */
    public function save(string $filename)
    {
        return $this->xml()->save($filename);
    }

    /**
     * @return string
     */
    public function getXSL()
    {
        $file = './xslt/cadenaoriginal_3_3.xslt';

        if (file_exists($file)) {
            return $file;
        }

        return static::XSL_ENDPOINT;
    }
}
