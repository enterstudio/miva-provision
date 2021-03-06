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

use Miva\Provisioning\Builder\Fragment\ProductRelatedProductAssign;

/**
* ProductRelatedProductAssignTest
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class ProductRelatedProductAssignTest extends \PHPUnit_Framework_TestCase
{

    /**
     * testFunctionality
     * 
     * Test basic class functionality
     */
    public function testFunctionality()
    {
        $fragment = new ProductRelatedProductAssign();

        $fragment
          ->setProductCode('ProductCode')
          ->setRelatedProductCode('RelatedProductCode');
        
        
        $this->assertEquals($fragment->getProductCode(), 'ProductCode');
        $this->assertEquals($fragment->getRelatedProductCode(), 'RelatedProductCode');
      

        $expectedXml = '<ProductRelatedProduct_Assign product_code="ProductCode" relatedproduct_code="RelatedProductCode" />';
    }
}
        