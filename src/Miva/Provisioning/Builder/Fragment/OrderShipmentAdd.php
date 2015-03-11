<?php
/*
* This file is part of the Miva PHP Provision package.
*
* (c) Gassan Idriss <gidriss@miva.com>
*
* For the full copyright and license information, please view the LICENSE
* file that was distributed with this source code.
*/
namespace Miva\Provisioning\Builder\Fragment;

use Miva\Version;
use Miva\Provisioning\Builder\Helper\XmlHelper;
use Miva\Provisioning\Builder\SimpleXMLElement;
use Miva\Provisioning\Builder\Fragment\Model\StoreFragmentInterface;

/**
* OrderShipmentAdd
*
* @author Gassan Idriss <gidriss@miva.com>
*/
class OrderShipmentAdd implements StoreFragmentInterface
{

    /** @var int */
    public $orderId;
    
    /** @var string */
    public $productList = array();
    
    /** @var string */
    public $code;
    

    /**
     * getOrderId
     *
     * @return int
    */
    public function getOrderId()
    {
        return $this->orderId;
    }
    
    /**
     * setOrderId
     *
     * @param int $orderId
     *
     * @return self
    */
    public function setOrderId($orderId)
    {
        $this->orderId = $orderId;
        return $this;
    }
    
    /**
     * getProductList
     *
     * @return array
    */
    public function getProductList()
    {
        return $this->productList;
    }
    
    /**
     * setProductList
     *
     * @param array $productList
     *
     * @return self
    */
    public function setProductList(array $productList)
    {
        $this->productList = $productList;
        return $this;
    }
    
    /**
     * addProductList
     *
     * @param ProductListProduct $product
     *
     * @return self
    */
    public function addProductList(ProductListProduct $product)
    {
        $this->productList[] = $product;
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
     * {@inheritDoc}
     * 
     * Format:
     * 
     * <OrderShipment_Add order_id="1000">
     *       <ProductList>                                   (Required)
     *           <Product product_code="p1" quantity="1" />      (required)
     *       </ProductList>
     *      <Code>SHIPMENT_CODE</Code>                      (Required)
     *   </OrderShipment_Add>
     *
    */
    public function toXml($version = Version::CURRENT, array $options = array())
    {

        $xmlObject = new SimpleXMLElement('<OrderShipment_Add></OrderShipment_Add>');

        $xmlObject->addAttribute('order_id', $this->getOrderId());
        
        $productListXml = $xmlObject->addChild('ProductList');
        
        foreach($this->getProductList() as $product) {
            $productXml = $productListXml->addChild('Product');
            $productXml->addAttribute('product_code', $product->getCode());
            $productXml->addAttribute('quantity', $product->getQuantity());
        }
        
        $xmlObject->addChild('Code', $this->getCode());
        
        return $xmlObject;
    }
}
               