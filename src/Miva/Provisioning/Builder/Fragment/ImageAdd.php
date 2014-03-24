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
use Miva\Provisioning\Builder\Helper\XmlHelper;
use Miva\Provisioning\Builder\SimpleXMLElement;

/**
* ImageAdd
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class ImageAdd implements Model\StoreFragmentInterface
{
    
    /** @var string */
    protected $filePath;

    /**
     * Constructor
     * 
     * @param string $filePath
     */
    public function __construct($filePath = null)
    {
         $this->filePath = $filePath;
    }
     
    /**
     * getFilePath
     *
     * @return string
    */
    public function getFilePath()
    {
        return $this->filePath;
    }
    
    /**
     * setFilePath
     *
     * @param string $filePath
     *
     * @return self
    */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;
        return $this;
    }


    /**
     * {@inheritDoc}
     * 
     * Format:
     * 
     * <Image_Add filepath="graphics/00000001/s2k_silver_front.jpg" />
    */
    public function toXml($version = Version::CURRENT, array $options = array())
    {

        $xmlObject = new SimpleXMLElement('<Image_Add></Image_Add>');
        
        $xmlObject->addAttribute('filepath', $this->getFilePath());
        
        return $xmlObject;
    }
}
