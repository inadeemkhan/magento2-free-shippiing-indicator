<?php
/**
 * Copyright © Chris Mallory All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Nadeem\FreeShippingIndicator\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    /**
     * @var CORE_FREE_SHIPPING_STORE_CONFIG_PATH
     */
    protected const CORE_FREE_SHIPPING_STORE_CONFIG_PATH = 'carriers/freeshipping/';

    /**
     * @var FREE_SHIPPING_INDICATOR_XML_CONFIG_PATH
     */
    protected const FREE_SHIPPING_INDICATOR_XML_CONFIG_PATH = 'free_shipping_indicator/general/';

    /**
     * @var INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH
     */
    protected const INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH = 'free_shipping_indicator/customization/';

    /**
     * @var ScopeConfigInterface $scopeConfig
     */
    protected $scopeConfig;

    /**
     * @param \Magento\Framework\App\Helper\Context $context
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Checkout\Model\Session $session
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
    ) {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context);
    }

    /**
     * @return bool
     */
    public function isEnable()
    {
        return $this->scopeConfig->getValue(
                self::FREE_SHIPPING_INDICATOR_XML_CONFIG_PATH 
                . 'is_enable', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return string
     */
    public function getCoreShippingConfig()
    {
        return $this->scopeConfig->getValue(
                self::FREE_SHIPPING_INDICATOR_XML_CONFIG_PATH 
                . 'use_core_freeshipping_config', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getOrderMinTotal()
    {
        return (float)$this->scopeConfig->getValue(
                self::FREE_SHIPPING_INDICATOR_XML_CONFIG_PATH 
                . 'order_min_total', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getOrderSubtotal()
    {
        return (float)$this->scopeConfig->getValue(
                self::FREE_SHIPPING_INDICATOR_XML_CONFIG_PATH 
                . 'use_order_subtotal', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getOrderSubtotalWithDiscount()
    {
        return $this->scopeConfig->getValue(
                self::FREE_SHIPPING_INDICATOR_XML_CONFIG_PATH 
                . 'order_subtotal_includes_discount', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getCoreFreeShippingSubtotal()
    {
        return $this->scopeConfig->getValue(
                self::CORE_FREE_SHIPPING_STORE_CONFIG_PATH 
                . 'free_shipping_subtotal', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getFontSize()
    {
        return $this->scopeConfig->getValue(
                self::INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH 
                . 'font_size', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getTextMessage()
    {
        return $this->scopeConfig->getValue(
                self::INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH 
                . 'text_message', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getMessageTextColor()
    {
        return $this->scopeConfig->getValue(
                self::INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH 
                . 'message_text_color', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getMessageBackground()
    {
        return $this->scopeConfig->getValue(
                self::INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH 
                . 'message_background', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getProgressBarColor()
    {
        return $this->scopeConfig->getValue(
                self::INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH 
                . 'progress_bar_color', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getEligibleTextMessage()
    {
        return $this->scopeConfig->getValue(
                self::INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH 
                . 'eligible_text_message', ScopeInterface::SCOPE_STORE );
    }

    /**
     * @return float
     */
    public function getCustomCSS()
    {
        return $this->scopeConfig->getValue(
                self::INDICATOR_CUSTOMIZATION_XML_CONFIG_PATH 
                . 'custom_css', ScopeInterface::SCOPE_STORE );
    }
}
