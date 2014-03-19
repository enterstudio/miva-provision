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

use Miva\Provisioning\Builder\Fragment\ProductRelatedProduct;

/**
* ProductRelatedProductTest
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class ProductRelatedProductTest extends \PHPUnit_Framework_TestCase
{

    /**
     * functionalTest
     * 
     * Test basic class functionality
     */
    public function functionalTest()
    {
        $fragment = new ProductRelatedProduct();

        $fragment
          ->setProductCode('ProductCode')
          ->setRelatedProductCode('RelatedProductCode');
        
        
        $this->assertEquals($fragment->getProductCode(), 'ProductCode');
        $this->assertEquals($fragment->getRelatedProductCode(), 'RelatedProductCode');
      

        $expectedXml = '<ProductRelatedProduct_Assign product_code="ProductCode" relatedproduct_code="RelatedProductCode" />';
    }
}
        