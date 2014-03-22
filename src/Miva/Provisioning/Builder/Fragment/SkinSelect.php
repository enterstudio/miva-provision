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
* SkinSelect
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class SkinSelect implements FragmentInterface
{

    /** @var string */
    protected $code;

    /**
     * Constructor
     * 
     * @param string $code
     */
    public function __construct($code = null)
    {
        $this->code = $code;
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
    * getCode
    *
    * @return string
    */
    public function getCode()
    {
        return $this->code;
    }

  
    /**
     * {@inheritDoc}
     * 
     * Format:
     * 
     *  <Skin_Select code="fresh1" />
    */
    public function toXml()
    {

        $xmlObject = new \SimpleXmlElement('<Skin_Select />');
        
        $xmlObject->setAttribute('code', $this->getCode());
        
        return $xmlObject;
    }

}