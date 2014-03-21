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
* HandlingChargeUpdate
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class HandlingChargeUpdate implements FragmentInterface
{

   /** @var string */
   protected $triggerType;
   
   /** @var float */
   protected $triggerMinimumValue;
   
   /** @var float */
   protected $triggerMaximumValue;  
   
   /** @var string */
   protected $amountType;
   
   /** @var float */
   protected $amount;
   
   /** @var string */
   protected $separateLineItem;
   
   /** @var string */
   protected $description;
   
   /** @var string */
   protected $taxExempt;
   
   /** @var array */
   private $triggerTypeChoices = array(
    'Disabled',
    'Always',
    'SubTotal',
    'Quantity',
    'Weight',
   );
   
    /**
     * getTriggerType
     *
     * @return string
    */
    public function getTriggerType()
    {
        return $this->triggerType;
    }
    
    /**
     * setTriggerType
     *
     * @param string $triggerType
     *
     * @return self
    */
    public function setTriggerType($triggerType)
    {
        $this->triggerType = $triggerType;
        return $this;
    }

    /**
     * getTriggerMinimumValue
     *
     * @return float
    */
    public function getTriggerMinimumValue()
    {
        return $this->triggerMinimumValue;
    }
    
    /**
     * setTriggerMinimumValue
     *
     * @param float $triggerMinimumValue
     *
     * @return self
    */
    public function setTriggerMinimumValue($triggerMinimumValue)
    {
        $this->triggerMinimumValue = $triggerMinimumValue;
        return $this;
    }

 
     /**
     * getTriggerMaximumValue
     *
     * @return float
    */
    public function getTriggerMaximumValue()
    {
        return $this->triggerMaximumValue;
    }
    
    /**
     * setTriggerMaximumValue
     *
     * @param float $triggerMaximumValue
     *
     * @return self
    */
    public function setTriggerMaximumValue($triggerMaximumValue)
    {
        $this->triggerMaximumValue = $triggerMaximumValue;
        return $this;
    }
    
    /**
     * getAmountType
     *
     * @return string
    */
    public function getAmountType()
    {
        return $this->amountType;
    }
    
    /**
     * setAmountType
     *
     * @param string $amountType
     *
     * @return self
    */
    public function setAmountType($amountType)
    {
        $this->amountType = $amountType;
        return $this;
    }


  
    /**
     * {@inheritDoc}
     * 
     * Format:
     * 
     *  <HandlingCharge_Update>
     *      <TriggerType>Disabled|Always|SubTotal|Quantity|Weight</TriggerType>
     *      <TriggerMinimumValue>0.00</TriggerMinimumValue>
     *      <TriggerMaximumValue>10.00</TriggerMaximumValue>
     *      <AmountType>Fixed|PercentOfShipping|PercentOfSubTotal</AmountType>
     *      <Amount>5.55</Amount>
     *      <SeparateLineItem>Yes</SeparateLineItem>
     *      <Description>Handling Charge</Description>
     *      <TaxExempt>No</TaxExempt>
     *   </HandlingCharge_Update>
    */
    public function toXml()
    {

        $xml = null;
        $xmlObject = new \SimpleXmlElement('<Fragment></Fragment>');
        $xmlObject->addChild('Name', sprintf('<![CDATA[%s]]>', $this->getName()));
        $xmlObject->addChild('Code', $this->getCode());
        $xmlObject->addChild('Active', $this->getActive() ? $this->getActive() : 'Yes');

        
        foreach ($xmlObject->children() as $child) {
            $xml .= $child->saveXml();
        }
        
        return $xml;
    }

}