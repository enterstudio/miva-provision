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
* BoxAdd
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class BoxAdd implements Model\StoreFragmentInterface
{
    
    /** @var string */
    protected $description;
    
    /** @var boolean */
    protected $enabled = true;    
    
    /** @var float */
    protected $width;    
    
    /** @var float */
    protected $length;    
    
    /** @var float */
    protected $height;
    
    /** @var array */
    protected $boxPackageSettings = array(
        'MaxWeight' => null, 
        'MaxQuantity' => null,
    );

    /**
     * getDescription
     *
     * @return string
    */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * setDescription
     *
     * @param string description
     *
     * @return self
    */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    /**
     * getEnabled
     *
     * @return boolean
    */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * setEnabled
     *
     * @param string enabled
     *
     * @return self
    */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
        return $this;
    }
        
    /**
     * getWidth
     *
     * @return float
    */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * setWidth
     *
     * @param float width
     *
     * @return self
    */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }
        
    /**
     * getLength
     *
     * @return float
    */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * setLength
     *
     * @param float length
     *
     * @return self
    */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }
    
    /**
     * getHeight
     *
     * @return float
    */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * setHeight
     *
     * @param float height
     *
     * @return self
    */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }
    
    /**
     * getBoxPackageSettings
     *
     * @return array
    */
    public function getBoxPackageSettings()
    {
        return $this->boxPackageSettings;
    }

    /**
     * setBoxPackageSettings
     *
     * @param array boxPackageSettings
     *
     * @return self
    */
    public function setBoxPackageSettings($maxWeight, $maxQuantity)
    {
        $this->boxPackageSettings = array($maxWeight,$maxQuantity);
        return $this;
    }
    

    /**
     * {@inheritDoc}
     * 
     * Format:
     * 
     *     <Box_Add>
     *        <Description>Box</Description>
     *        <Enabled>Yes</Enabled>
     *        <Width>10.11</Width>
     *         <Length>10.11</Length>
     *        <Height>10.11</Height>
     *
     *        <BoxPackingSettings>                -- optional
     *            <MaxWeight>1.23</MaxWeight>        -- packbyweight
     *            <MaxQuantity>5</MaxQuantity>    -- packbyquantity
     *        </BoxPackingSettings>
     *    </Box_Add>
    */
    public function toXml($version = Version::CURRENT, array $options = array())
    {

        $xmlObject = new SimpleXMLElement('<Box_Add></Box_Add>');
        
        $xmlObject->addChild('Description', $this->getDescription());
        $xmlObject->addChild('Enabled', $this->getEnabled() ? 'Yes' : 'No');
        $xmlObject->addChild('Width', $this->getWidth());
        $xmlObject->addChild('Length', $this->getLength());
        $xmlObject->addChild('Height', $this->getHeight());
        
        $boxPackingSettings = $this->getBoxPackingSettings();
        
        if(implode('',$boxPackingSettings)) {
            $boxPackingSettingsXml = $xmlObject->addChild('BoxPackingSettings');
            foreach($boxPackingSettings as $name => $value) {
                $boxPackingSettingsXml->addChild($name, $value);
            }
        }
 
        return $xmlObject;
    }

}
    