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

use DOMElement;
use DOMDocument;
use DOMNodeList;

class Node
{
    /**
     * Node document.
     *
     * @var DOMDocument
     */
    protected $document;

    /**
     * Node element.
     *
     * @var DOMElement
     */
    protected $element;

    /**
     * Define the parent node name.
     *
     * @var string|null
     */
    protected $parentNodeName = null;

    /**
     * Define the node name.
     *
     * @var string
     */
    protected $nodeName;

    /**
     * Node attributes.
     *
     * @var array
     */
    protected $attr = [];

    /**
     * Create a new node instance.
     *
     * @param array $attr
     */
    public function __construct(array ...$attr)
    {
        $this->attr = $attr;

        $this->document = new DOMDocument('1.0', 'UTF-8');
        $this->document->preserveWhiteSpace = false;
        $this->document->formatOutput = true;

        if ($nodeName = $this->getNodeName()) {
            $this->element = $this->document->createElement($nodeName);
            $this->document->appendChild($this->element);
            $this->setAttr($this->element, $this->getAttr());
        }
    }

    /**
     * Add a new node.
     *
     * @param \Kinedu\CfdiXML\Common\Node $node
     *
     * @return void
     */
    public function add(Node $node)
    {
        $wrapperElement = null;

        if ($node->schemaDefinition && $node->globalSchemaLocation) {
            $this->setSchemaDefinition(
                $node->getSchemaLocation()
            );

            $this->setNamespace($node);
        }

        $nodeElement = $this->document->createElement($node->getNodeName());
        $this->setAttr($nodeElement, $node->getAttr());

        foreach ($node->element->childNodes as $child) {
            $nodeElement->appendChild(
                $this->document->importNode($child, true)
            );
        }

        if ($wrapperName = $node->getWrapperNodeName()) {
            $wrapperElement = $this->getDirectChildElementByName(
                $this->element->childNodes,
                $wrapperName
            );

            if (!$wrapperElement) {
                $wrapperElement = $this->document->createElement($wrapperName);
                $this->element->appendChild($wrapperElement);
            }

            $this->setAttr($wrapperElement, $node->getAttr('wrapper'));
        }

        if ($parentName = $node->getParentNodeName()) {
            $currentElement = ($wrapperElement) ? $wrapperElement : $this->element;

            $parentNode = $this->getDirectChildElementByName(
                $currentElement->childNodes,
                $parentName
            );

            if (!$parentNode) {
                $parentElement = $this->document->createElement($parentName);
                $currentElement->appendChild($parentElement);
                $parentElement->appendChild($nodeElement);
                $this->setAttr($parentElement, $node->getAttr('parent'));
            } else {
                $parentNode->appendChild($nodeElement);
            }
        } else {
            $this->element->appendChild($nodeElement);
        }
    }

    /**
     * Search the direct child of an element.
     *
     * @param DOMNodeList $children
     * @param string $find
     *
     * @return DOMElement|null
     */
    protected function getDirectChildElementByName(DOMNodeList $children, string $find)
    {
        foreach ($children as $child) {
            if ($child->nodeName == $find) {
                return $child;
            }
        }

        return null;
    }

    /**
     * @param  \Kinedu\CfdiXML\Common\Node  $node
     * @return void
     */
    public function setNamespace(Node $node)
    {
        $element = $this->element;

        $namespaceKey = "xmlns:{$node->namespaceKey}";
        $namespaceValue = $node->getNamespace();

        $elementAttr = [];

        if ($element->hasAttributes()) {
            $lastAttrName = null;

            foreach (iterator_to_array($element->attributes) as $attr) {
                if ((substr($lastAttrName, 0, 5) == 'xmlns') &&
                    (substr($attr->name, 0, 5) != 'xmlns')) {
                    $elementAttr[$namespaceKey] = $namespaceValue;
                }

                $elementAttr[$lastAttrName = $attr->name] = $attr->value;

                $element->removeAttributeNode($attr);
            }
        }

        $this->setAttr($element, $elementAttr);
    }

    /**
     * @param  string  $schemaDefinition
     * @return void
     */
    public function setSchemaDefinition(string $schemaDefinition)
    {
        $attrName = 'xsi:schemaLocation';

        $node = $this->element;

        if ($node->hasAttribute($attrName)) {
            $value = $node->getAttribute($attrName);
            $value = "{$value} {$schemaDefinition}";

            $node->setAttribute($attrName, $value);
        }
    }

    /**
     * Get node attributes.
     *
     * @param string $index
     *
     * @return array|null
     */
    public function getAttr(string $index = 'node')
    {
        $attrIndex = ['node', 'parent', 'wrapper'];

        $index = (in_array($index, $attrIndex))
            ? array_search($index, $attrIndex)
            : 0;

        return $this->attr[$index] ?? null;
    }

    /**
     * Adds attributes to an element.
     *
     * @param DOMElement $element
     * @param array $attr
     *
     * @return void
     */
    public function setAttr(DOMElement $element, array $attr = null)
    {
        if (!is_null($attr)) {
            foreach ($attr as $key => $value) {
                $element->setAttribute($key, $value);
            }
        }
    }

    /**
     * Get element.
     *
     * @return DOMElement
     */
    public function getElement(): DOMElement
    {
        return $this->element;
    }

    /**
     * Get document.
     *
     * @return DOMDocument
     */
    public function getDocument(): DOMDocument
    {
        return $this->document;
    }

    /**
     * Get wrapper node name.
     *
     * @return string|null
     */
    public function getWrapperNodeName()
    {
        return $this->wrapperNodeName ?? null;
    }

    /**
     * Get parent node name.
     *
     * @return string|null
     */
    public function getParentNodeName()
    {
        return $this->parentNodeName ?? null;
    }

    /**
     * Get node name.
     *
     * @return string
     */
    public function getNodeName()
    {
        return $this->nodeName ?? null;
    }
}
