<?php

/**
 *
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_Captcha
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */
class MobWeb_Captcha_CaptchaController extends Mage_Core_Controller_Front_Action
{

    /**
     * Returns the captcha image with the corresponding headers
     *
     * @return Null
     */
    public function imageAction()
    {
        require_once(Mage::getBaseDir('lib') . DS . 'securimage' . DS . 'securimage.php');

        $configHelper = Mage::helper('mobweb_captcha/config');

        $img = new Securimage();
        $img->captcha_type = Securimage::SI_CAPTCHA_STRING;
        $img->charset = $configHelper->getConfig('captcha/charset');
        $img->case_sensitive = (boolean) $configHelper->getConfig('captcha/case_sensitive');
        $img->perturbation = $configHelper->getConfig('captcha/pertubation');
        $img->num_lines = $configHelper->getConfig('captcha/num_lines');
        $img->noise_level = $configHelper->getConfig('captcha/noise_level');
        $img->code_length = $configHelper->getConfig('captcha/code_length');

        $img->show();
    }
}