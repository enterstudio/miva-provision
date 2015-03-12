<?php
/*
* This file is part of the Miva PHP Provision package.
*
* (c) Gassan Idriss <gidriss@miva.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Miva\Provisioning\Builder\Fragment\Child;

use Miva\Version;
use Miva\Provisioning\Builder\Helper\XmlHelper;
use Miva\Provisioning\Builder\SimpleXMLElement;
use Miva\Provisioning\Builder\Fragment\Model\ChildFragment;

/**
 * ProductVariantAttributeTemplateAttributeBoolean
 *
 * @author Gassan Idriss <gidriss@miva.com>
 */
class ProductVariantAttributeTemplateAttributeBoolean implements ChildFragment
{
    /** @var  @var string  */
    public $attributeCode;

    /** @var string */
    public $attributeTemplateAttributeCode;

    /** @var boolean */
    public $present;

    /**
     * @return mixed
     */
    public function getAttributeCode()
    {
        return $this->attributeCode;
    }

    /**
     * @param mixed $attributeCode
     */
    public function setAttributeCode($attributeCode)
    {
        $this->attributeCode = $attributeCode;
        return $this;
    }


    /**
     * @return string
     */
    public function getAttributeTemplateAttributeCode()
    {
        return $this->attributeTemplateAttributeCode;
    }

    /**
     * @param string $attributeTemplateAttributeCode
     */
    public function setAttributeTemplateAttributeCode($attributeTemplateAttributeCode)
    {
        $this->attributeTemplateAttributeCode = $attributeTemplateAttributeCode;
        return $this;
    }



    /**
     * @return boolean
     */
    public function isPresent()
    {
        return $this->present;
    }

    /**
     * @param boolean $present
     */
    public function setPresent($present)
    {
        $this->present = $present;
        return $this;
    }


    /**
     * {@inheritDoc}
     *
     * Format:
     *
     *  <AttributeTemplateAttribute_Boolean attribute_code="test" attributetemplateattribute_code="checkbox" present="false"/>
     */
    public function toXml($version = Version::CURRENT, array $options = array())
    {

        $xmlObject = new SimpleXMLElement('<AttributeTemplateAttribute_Boolean />');

        $xmlObject->addAttribute('attribute_code', $this->getAttributeCode());
        $xmlObject->addAttribute('attributetemplateattribute_code', $this->getAttributeTemplateAttributeCode());
        $xmlObject->addAttribute('present', $this->getPresent() ? 'true' : 'false');

        return $xmlObject;
    }
}