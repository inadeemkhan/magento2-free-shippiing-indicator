<?php
/**
 * Copyright © Chris Mallory All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Nadeem\FreeShippingIndicator\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class FontSize
 * @package Nadeem\FreeShippingIndicator\Model\Config\Source
 */
class FontSize implements OptionSourceInterface
{
    /**
     * @return array
     */
    public function toOptionArray() : array
    {
        return [
            ['value' => '', 'label' => __('-- Select a value --')],
            ['value' => '12', 'label' => __('12 px')],
            ['value' => '13', 'label' => __('13 px')],
            ['value' => '14', 'label' => __('14 px')],
            ['value' => '15', 'label' => __('15 px')],
            ['value' => '16', 'label' => __('16 px')],
            ['value' => '17', 'label' => __('17 px')],
            ['value' => '18', 'label' => __('18 px')],
            ['value' => '19', 'label' => __('19 px')],
            ['value' => '20', 'label' => __('20 px')],
            ['value' => '21', 'label' => __('21 px')],
            ['value' => '22', 'label' => __('22 px')],
            ['value' => '23', 'label' => __('23 px')],
            ['value' => '24', 'label' => __('24 px')],
            ['value' => '25', 'label' => __('25 px')],
        ];
    }
}