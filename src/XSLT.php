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

use Kinedu\CfdiXslt\Retrieve;

class XSLT
{
    /**
     * Download the xslt files.
     *
     * @return void
     */
    public static function download()
    {
        $retrieve = new Retrieve();
        $retrieve->download('./xslt/');
    }
}
