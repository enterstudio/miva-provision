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

/**
* CategoryProduct
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class CategoryProductAssign implements FragmentInterface
{

    /** @var string */
    protected $categoryCode;
    
    /** @var string */
    protected $productCode;


    /**
     * Constructor
     * 
     * @param string $categoryCode
     * @param string $productCode
     */
    public function __construct($categoryCode = null, $productCode = null)
    {
        $this->categoryCode = $categoryCode;
        $this->productCode = $productCode;
    }

    /**
     * getCategoryCode
     *
     * @return string
    */
    public function getCategoryCode()
    {
        return $this->categoryCode;
    }
    
    /**
     * setCategoryCode
     *
     * @param string $categoryCode
     *
     * @return self
    */
    public function setCategoryCode($categoryCode)
    {
        $this->categoryCode = $categoryCode;
        return $this;
    }

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
     * {@inheritDoc}
     * 
     * Format:
     * 
     *  <CategoryProduct_Assign category_code="Food" product_code="ale-gallon" />
    */
    public function toXml()
    {
        $xmlObject = new \SimpleXmlElement('<CategoryProduct_Assign />');

        $xmlObject->addAttribute('category_code', $this->getCategoryCode());
        $xmlObject->addAttribute('product_code', $this->getProductCode());
        
        return $xmlObject;
    }

}