<?php
/*
* This file is part of the Miva PHP Provision package.
*
* (c) Gassan Idriss <gidriss@mivamerchant.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Miva\Provisioning\Builder\Fragment;

use Miva\Version;
use Miva\Provisioning\Builder\SimpleXMLElement;

/**
 * ProductAttributeAdd
 *
 * @author Gassan Idriss <gidriss@mivamerchant.com>
 */
class ProductAttributeAdd implements Model\StoreFragmentInterface
{

    /** @var string */
    public $productCode;

    /** @var string */
    public $attributeCode;

    /** @var string */
    public $code;

    /** @var string */
    public $type;

    /** @var string */
    public $prompt;

    /** @var string */
    public $image;

    /** @var int */
    public $price;

    /** @var int */
    public $cost;

    /** @var int */
    public $weight;

    /** @var boolean */
    public $required = false;

    /** @var boolean */
    public $inventory = false;

    /**
     * getProductCode
     *
     * @return string
     */
    public function getProductCode()
    {
        return $this->productCode;
    }

    /**
     * setProductCode
     *
     * @param string $productCode
     *
     * @return self
     */
    public function setProductCode($productCode)
    {
        $this->productCode = $productCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttributeCode()
    {
        return $this->attributeCode;
    }

    /**
     * @param string $attributeCode
     */
    public function setAttributeCode($attributeCode)
    {
        $this->attributeCode = $attributeCode;
        return $this;
    }



    /**
     * getCode
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * setCode
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * getType
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * setType
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * getPrompt
     *
     * @return string
     */
    public function getPrompt()
    {
        return $this->prompt;
    }

    /**
     * setPrompt
     *
     * @param string $prompt
     *
     * @return self
     */
    public function setPrompt($prompt)
    {
        $this->prompt = $prompt;
        return $this;
    }

    /**
     * getImage
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * setImage
     *
     * @param string $image
     *
     * @return self
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * getPrice
     *
     * @return int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * setPrice
     *
     * @param int $price
     *
     * @return self
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * getCost
     *
     * @return int
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * setCost
     *
     * @param int $cost
     *
     * @return self
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * getWeight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * setWeight
     *
     * @param int $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * getRequired
     *
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * setRequired
     *
     * @param boolean $required
     *
     * @return self
     */
    public function setRequired($required)
    {
        $this->required = $required;
        return $this;
    }

    /**
     * getInventory
     *
     * @return boolean
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * setInventory
     *
     * @param boolean $inventory
     *
     * @return self
     */
    public function setInventory($inventory)
    {
        $this->inventory = true === $inventory ? $inventory : false;
        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * Format:
     *
     * <ProductAttribute_Update product_code="chest" attribute_code="bar">
     *       <Code>lock</Code> <!-- Optional -->
     *       <Type>select</Type> <!-- Optional -->
     *       <Prompt><![CDATA[Lock]]></Prompt> <!-- Optional -->
     *       <Image/> <!-- Optional -->
     *       <Price>0.00</Price> <!-- Optional -->
     *       <Cost>0.00</Cost> <!-- Optional -->
     *       <Weight>0.00</Weight> <!-- Optional -->
     *       <Required>Yes</Required> <!-- Optional -->
     *       <Inventory>Yes</Inventory> <!-- Optional -->
     * </ProductAttribute_Update>
     *
     */
    public function toXml($version = Version::CURRENT, array $options = array())
    {
        $xmlObject = new SimpleXMLElement('<ProductAttribute_Update />');

        $xmlObject->addAttribute('product_code', $this->getProductCode());
        $xmlObject->addAttribute('attribute_code', $this->getAttributeCode());

        if ($this->getCode()) {
            $xmlObject->addChild('Code',$this->getCode());
        }

        if ($this->getType()) {
            $xmlObject->addChild('Type',$this->getType());
        }

        if ($this->getPrompt()) {
            $xmlObject->addChild('Prompt', $this->getPrompt())->addAttribute('method-call', 'addCDATA');
        }

        if ($this->getImage()) {
            $xmlObject->addChild('Image',$this->getImage());
        }

        if ($this->getPrice()) {
            $xmlObject->addChild('Price',$this->getPrice());
        }

        if ($this->getCost()) {
            $xmlObject->addChild('Cost',$this->getCost());
        }

        if ($this->getWeight()) {
            $xmlObject->addChild('Weight',$this->getWeight());
        }

        $xmlObject->addChild('Required',$this->getRequired() ? 'Yes' : 'No');
        $xmlObject->addChild('Inventory',$this->getInventory() ? 'Yes' : 'No');

        return $xmlObject;
    }
}
