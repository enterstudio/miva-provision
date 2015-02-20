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
 * ProductAttributeDelete
 *
 * @author Gassan Idriss <gidriss@mivamerchant.com>
 */
class ProductAttributeDeleteAll implements Model\StoreFragmentInterface
{

    /** @var string */
    public $productCode;

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
     * <ProductAttribute_Delete_All product_code="chest" />
     *
     */
    public function toXml($version = Version::CURRENT, array $options = array())
    {
        $xmlObject = new SimpleXMLElement('<ProductAttribute_Delete_All />');

        $xmlObject->addAttribute('product_code', $this->getProductCode());

        return $xmlObject;
    }
}