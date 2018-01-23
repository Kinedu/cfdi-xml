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

class Node
{
    /**
     * Define the parent node name, rename this attribute in inherit class.
     *
     * @var string|null
     */
    protected $parentNodeName = null;

    /**
     * Define the node name.
     *
     * @var string
     */
    protected $nodeName = '';

    public function getName()
    {
        return $this->nodeName;
    }
}
