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

use Miva\Provisioning\Builder\Fragment\AffiliateEmailNotificationUpdate;

/**
* AffiliateEmailNotificationUpdateTest
*
* @author Gassan Idriss <gidriss@mivamerchant.com>
*/
class AffiliateEmailNotificationUpdateTest extends \PHPUnit_Framework_TestCase
{

    /**
     * testFunctionality
     * 
     * Test basic class functionality
     */
    public function testFunctionality()
    {
        $fragment = new AffiliateEmailNotificationUpdate();
        
        $fragment->setSendEmailOnAffiliateSignups('SendEmailOnAffiliateSignups')
          ->setEmailFrom('EmailFrom')
          ->setEmailTo('EmailTo')
          ->setEmailCC('EmailCC')
          ->setSubject('Subject')
          ->setHeaderText('HeaderText');
          
          $this->assertEquals($fragment->getSendEmailOnAffiliateSignups(), 'SendEmailOnAffiliateSignups');
          $this->assertEquals($fragment->getEmailFrom(), 'EmailFrom');
          $this->assertEquals($fragment->getEmailTo(), 'EmailTo');
          $this->assertEquals($fragment->getEmailCC(), 'EmailCC');
          $this->assertEquals($fragment->getSubject(), 'Subject');
          $this->assertEquals($fragment->getHeaderText(), 'HeaderText');

    }


    /**
     * testValidXML
     * 
     * Make sure it builds valid XML
     */
    public function testValidXML()
    {
        
        $fragment = new AffiliateEmailNotificationUpdate();
        
        $fragment->setSendEmailOnAffiliateSignups('SendEmailOnAffiliateSignups')
          ->setEmailFrom('EmailFrom')
          ->setEmailTo('EmailTo')
          ->setEmailCC('EmailCC')
          ->setSubject('Subject')
          ->setHeaderText('HeaderText');

          
        $expectedXml = '<AffiliateEmailNotification_Update>
            <SendEmailOnAffiliateSignups>SendEmailOnAffiliateSignups</SendEmailOnAffiliateSignups>
            <EmailFrom>EmailFrom</EmailFrom>
            <EmailTo>EmailTo</EmailTo>
            <EmailCC>EmailCC</EmailCC>
            <Subject>Subject</Subject>
            <HeaderText>HeaderText</HeaderText>
        </AffiliateEmailNotification_Update>';
        
        $this->assertXmlStringEqualsXmlString($expectedXml, $fragment->toXML()->saveXML());
    }
}