<?php

/**
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_Captcha
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */
class MobWeb_Captcha_Block_Widget_Captcha extends Mage_Customer_Block_Widget_Abstract
{
    /**
     * Initialize block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('customer/widget/captcha.phtml');
    }

    /**
     * Check if captcha attribute enabled in system
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)Mage::helper('mobweb_captcha/config')->isEnabled();
    }

    /**
     * Check if captcha attribute marked as required
     *
     * @return bool
     */
    public function isRequired()
    {
        return true;
    }

    /**
     * Returns captcha URL
     *
     * @return string
     */
    public function getCaptchaUrl()
    {
        return Mage::getUrl('mobweb_captcha/captcha/image');
    }

    /**
     * Returns captcha description
     *
     * @return string
     */
    public function getCaptchaDescription()
    {
        return $this->__('Please enter the above %d letters into the field below.', $this->getCaptchaLength());
    }

    /**
     * Returns captcha length
     *
     * @return integer
     */
    public function getCaptchaLength()
    {
        return Mage::helper('mobweb_captcha/config')->getConfig('captcha/code_length');
    }
}
