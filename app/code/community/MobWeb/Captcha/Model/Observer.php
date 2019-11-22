<?php

/**
 *
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_Captcha
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */
class MobWeb_Captcha_Model_Observer extends Mage_Core_Model_Observer
{

    /**
     * Controller that validates the captcha before creating the customer account
     *
     * @param Varien_Event_Observer $observer
     * @return MobWeb_Captcha_Model_Observer
     */
    public function controllerActionPredispatchCustomerAccountCreatepost(Varien_Event_Observer $observer)
    {
        if (!Mage::helper('mobweb_captcha/config')->isEnabled()) {
            return $this;
        }
        
        $isValid = false;
        $controller = $observer->getControllerAction();
        $captcha = $controller->getRequest()->getPost('captcha');
        if ($captcha) {
            $isValid = Mage::helper('mobweb_captcha/captcha')->validate($captcha);
        }

        if (!$isValid) {
            Mage::getSingleton('customer/session')->addError(Mage::helper('mobweb_captcha')->__('Incorrect CAPTCHA, please enter the letters shown into the field again.'));
            $controller->setFlag('', Mage_Core_Controller_Varien_Action::FLAG_NO_DISPATCH, true);
            Mage::getSingleton('customer/session')->setCustomerFormData($controller->getRequest()->getPost());
            $controller->getResponse()->setRedirect(Mage::getUrl('*/*/create'));
        }

        return $this;
    }
}