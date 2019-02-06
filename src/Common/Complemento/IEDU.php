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

use Kinedu\CfdiXML\Common\ComplementoConcepto;

class IEDU extends ComplementoConcepto
{
    /** @var string */
    protected $namespace = 'iedu';

    /** @var string */
    protected $namespaceKey = 'iedu';

    /** @var string */
    protected $schemaDefinition = 'iedu';

    /** @var string */
    protected $nodeName = 'iedu:instEducativas';

    /**
     * Create a new iedu instance.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes)
    {
        $attributes = array_merge(['version' => '1.0'], $attributes);

        parent::__construct($attributes);
    }
}
