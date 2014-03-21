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
* MivaMailerSettingsUpdate
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class MivaMailerSettingsUpdate implements FragmentInterface
{
    
    
    /** @var string */
    protected $account;
    
    /** @var string */
    protected $server;
    

    
    /**
     * getAccount
     *
     * @return string
    */
    public function getAccount()
    {
        return $this->account;
    }
    
    /**
     * setAccount
     *
     * @param string $account
     *
     * @return self
    */
    public function setAccount($account)
    {
        $this->account = $account;
        return $this;
    }
    
    /**
     * getServer
     *
     * @return string
    */
    public function getServer()
    {
        return $this->server;
    }
    
    /**
     * setServer
     *
     * @param string $server
     *
     * @return self
    */
    public function setServer($server)
    {
        $this->server = $server;
        return $this;
    }
    

    /**
     * {@inheritDoc}
     * 
     * Format:
     * 
     *   <MivaMailerSettings_Update>
     *       <Account/>
     *       <Server/>
     *   </MivaMailerSettings_Update>
     *
    */
    public function toXml()
    {

        $xml = null;
        $xmlObject = new \SimpleXmlElement('<Fragment></Fragment>');

        foreach ($xmlObject->children() as $child) {
            $xml .= $child->saveXml();
        }
        
        return $xml;
    }
}