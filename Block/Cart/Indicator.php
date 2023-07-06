<?php
/**
 * Copyright © Chris Mallory All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Nadeem\FreeShippingIndicator\Block\Cart;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class Indicator extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $session;
    /**
     * @var \Magento\Framework\Pricing\PriceCurrencyInterface
     */
    protected $priceCurrency;
    /**
     * @var Nadeem\FreeShippingIndicator\Helper\Data
     */
    protected $helper;

    /**
     * Countdown constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Checkout\Model\Session $session
     * @param \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency
     * @param \Nadeem\FreeShippingIndicator\Helper\Data $helper
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $session,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Nadeem\FreeShippingIndicator\Helper\Data $helper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->session = $session;
        $this->priceCurrency = $priceCurrency;
        $this->helper = $helper;
    }

    /**
     * Get minimum order total required to be eligible for free shipping
     *
     * @return float
     */
    public function getFreeShippingMinValue(): float
    {
        $isModuleEnable = $this->helper->isEnable();
        $freeShippingMethodConfig = $this->helper->getCoreShippingConfig();
        $orderMinTotal = $this->helper->getOrderMinTotal();
        
        if ( $isModuleEnable && $freeShippingMethodConfig ) {
            return (float)$this->getFreeShippingMethodMinValue();
        }
        return (float)$orderMinTotal;
    }

    /**
     * Get minimum order total required to be eligible for free shipping
     *
     * @return float
     */
    public function getFreeShippingMethodMinValue()
    {
        $freeShippingSubtotal = $this->helper->getCoreFreeShippingSubtotal();
        return $freeShippingSubtotal;
    }

    /**
     * Get current quote/cart total
     *
     * @return float
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function getCurrentTotal()
    {
        $quote = $this->session->getQuote();
        $useOrderSubtotal = $this->helper->getOrderSubtotal();
        $orderTotalWithDiscount = $this->helper->getOrderSubtotalWithDiscount();
        if (!$useOrderSubtotal) {
            return $quote->getGrandTotal();
        }
        if ($orderTotalWithDiscount) {
            return $quote->getSubtotalWithDiscount();
        }
        return (float)$quote->getSubtotal();
    }

    /**
     * Checking if Order total is eligible for free shpping
     *
     * @return bool
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function isOrderEligibleForFreeShipping(): bool
    {
        $isModuleEnable = $this->helper->isEnable();
        if ($isModuleEnable) {
            $currentTotal = $this->getCurrentTotal();
            $freeShippingMethodConfig = $this->helper->getCoreShippingConfig();
            
            if ($freeShippingMethodConfig) {
                $isFreeShippingEnable = $this->helper->isEnable();
                if ($isFreeShippingEnable) {
                    return ($currentTotal >= $this->getFreeShippingMethodMinValue());
                }
                return false;
            }
            return ($currentTotal >= $this->getFreeShippingMinValue());
        }
        return false;
    }

    /**
     * @param float $price
     * @param int $precision
     *
     * @return string
     */
    public function getFormattedPrice(float $price, int $precision = 2): string
    {
        return $this->priceCurrency->format($price, false, $precision);
    }

    /**
     * Get difference between minimum order total for free shipping current order total
     *
     * @return float
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function getFreeShippingAmountDifference(): float
    {
        return $this->getFreeShippingMinValue() - $this->getCurrentTotal();
    }

    /**
     * Get percentage completed towards free shipping
     *
     * @return float
     * @throws LocalizedException
     * @throws NoSuchEntityException
     */
    public function getFreeShippingCompletionRate(): float
    {
        return ($this->getCurrentTotal() / $this->getFreeShippingMinValue()) * 100;
    }

    /**
     *
     * @return bool
     */
    public function isModuleEnable()
    {
        return $this->helper->isEnable();
    }

    /**
     *
     * @return string
     */
    public function getFontSize()
    {
        $fontSize = "14";
        if (!empty($this->helper->getFontSize())) {
            return $this->helper->getFontSize();
        }
        return $fontSize;
    }

    /**
     *
     * @return string
     */
    public function getTextMessage()
    {
        $textMessage = "To get FREE SHIPPING, add ";
        if (!empty($this->helper->getTextMessage())) {
            return $this->helper->getTextMessage();
        }
        return $textMessage;
    }

    /**
     *
     * @return string
     */
    public function getMessageBackground()
    {
        $messageBackground = "#ff5501";
        if (!empty($this->helper->getMessageBackground())) {
            return $this->helper->getMessageBackground();
        }
        return $messageBackground;
    }

    /**
     *
     * @return string
     */
    public function getProgressBarColor()
    {
        $progressBarColor = "red";
        if (!empty($this->helper->getProgressBarColor())) {
            return $this->helper->getProgressBarColor();
        }
        return $progressBarColor;
    }

    /**
     *
     * @return string
     */
    public function getCustomCSS()
    {
        $customCSS = "";
        if (!empty($this->helper->getCustomCSS())) {
            return $this->helper->getCustomCSS();
        }
        return $customCSS;
    }

    /**
     *
     * @return string
     */
    public function getMessageTextColor()
    {
        $messageTextColor = "red";
        if (!empty($this->helper->getMessageTextColor())) {
            return $this->helper->getMessageTextColor();
        }
        return $messageTextColor;
    }

    /**
     *
     * @return string
     */
    public function getEligibleTextMessage()
    {
        $eligibleTextMessage = "Your order is eligible for FREE SHIPPING.";
        if (!empty($this->helper->getEligibleTextMessage())) {
            return $this->helper->getEligibleTextMessage();
        }
        return $eligibleTextMessage;
    }
}