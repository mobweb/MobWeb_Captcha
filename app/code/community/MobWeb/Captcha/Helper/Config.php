<?php

/**
 * @author    Louis Bataillard <info@mobweb.ch>
 * @package    MobWeb_Captcha
 * @copyright    Copyright (c) MobWeb GmbH (https://mobweb.ch)
 */
class MobWeb_Captcha_Helper_Config extends Mage_Core_Helper_Abstract
{
    const CONFIG_BASE_PATH = 'mobweb_captcha';

    /**
     * Returns the specified config's value
     *
     * @param String $path
     * @return String
     */
    function getConfig($path)
    {
        $path = self::CONFIG_BASE_PATH . '/' . $path;

        return Mage::getStoreConfig($path);
    }

    /**
     * Returns wether the extension is enabled
     *
     * @return Boolean
     */
    function isEnabled()
    {
        $path = 'general/enabled';

        return (boolean) $this->getConfig($path);
    }
}