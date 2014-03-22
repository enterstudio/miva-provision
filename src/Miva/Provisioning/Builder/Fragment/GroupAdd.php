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
* GroupAdd
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class GroupAdd implements FragmentInterface
{
    
    /** @var string */
    protected $name;

    /** @var array */
    protected $privileges = array();
    
    /**
    * setName
    *
    * @param string $name
    *
    * @return self
    */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
    * getName
    *
    * @return string
    */
    public function getName()
    {
        return $this->name;
    }
    
    /**
    * setPrivilege
    *
    * @param array $privileges
    *
    * @return self
    */
    public function setPrivileges(array $privileges)
    {
        $this->privileges = $privileges;
        return $this;
    }

    /**
    * getPrivileges
    *
    * @return array
    */
    public function getPrivileges()
    {
        return $this->privileges;
    }

    /**
     * addPrivilege
     * 
     * @param string $code
     * @param int $view
     * @param int $add
     * @param int $modify
     * @param int $delete 
     *
     * @return array
    */
    public function addPrivilege($code, $view = 0, $add = 0, $modify = 0, $delete = 0)
    {
        $this->privileges[$code] = array(
            'code' => $code,
            'view' => $view,
            'add' => $add,
            'modify' => $modify,
            'delete' => $delete,
        );
        return $this;
    }
    
    /**
     * {@inheritDoc}
     * 
     * Format:
     * 
     *  <Group_Add name="View">
     *       <Privilege code="AFLT" view="1" add="0" modify="0" delete="0" /> <!-- MANY OK -->
     *   </Group_Add>
    */
    public function toXml()
    {
        $xmlObject = new \SimpleXmlElement('<Group_Add></Group_Add>');
        
        $xmlObject->setAttribute('name', $this->getName());
        
        foreach($this->getPrivileges() as $privilege) {
            $privilege = $xmlObject->addChild('Privilege');
            $privilege->setAttribute('code', $privilege['code']);
            $privilege->setAttribute('view', $privilege['view']);
            $privilege->setAttribute('add', $privilege['add']);
            $privilege->setAttribute('modify', $privilege['modify']);
            $privilege->setAttribute('delete', $privilege['delete']);
        }

        return $xmlObject;
    }

}