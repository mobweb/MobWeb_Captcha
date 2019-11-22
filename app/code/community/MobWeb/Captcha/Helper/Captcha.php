<?php

/**
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_Captcha
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */
class MobWeb_Captcha_Helper_Captcha extends Mage_Core_Helper_Abstract
{

    /**
     * Validates the captcha value
     *
     * @param String $value
     * @return Boolean
     */
    function validate($value)
    {
        require_once(Mage::getBaseDir('lib') . DS . 'securimage' . DS . 'securimage.php');

        $securimage = new Securimage();

        return $securimage->check($value);
    }
}