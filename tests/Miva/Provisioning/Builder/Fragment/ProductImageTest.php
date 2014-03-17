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

use Miva\Provisioning\Builder\Fragment\ProductImage;

/**
* ProductImageTest
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class ProductImageTest extends \PHPUnit_Framework_TestCase
{

    /**
     * functionalTest
     * 
     * Test basic class functionality
     */
    public function functionalTest()
    {
        $fragment = new ProductImage();
        
        $fragment
          ->setProductCode('ProductCode')
          ->setFilePath('FilePath')
          ->setTypeCode('TypeCode');
        
        
        $this->assertEquals($fragment->getProductCode(), 'ProductCode');
        $this->assertEquals($fragment->getFilePath(), 'FilePath');
        $this->assertEquals($fragment->getTypeCode(), 'TypeCode');
      

        $expectedXml = '<ProductImage_Add product_code="ProductCode" filepath="FilePath" type_code="TypeCode" />';
    }
}
        