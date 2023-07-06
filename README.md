# Mage2 Module Nadeem FreeShippingIndicator

    ``nadeem/module-freeshippingindicator``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Magento2 extension to show indicator for free shipping on cart page.

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Nadeem`
 - Enable the module by running `php bin/magento module:enable Nadeem_FreeShippingIndicator`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require nadeem/module-freeshippingindicator`
 - enable the module by running `php bin/magento module:enable Nadeem_FreeShippingIndicator`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - enable (free_shipping_indicator/general/enable)

 - use_freeshipping_method_config (free_shipping_indicator/general/use_freeshipping_method_config)

 - min_total (free_shipping_indicator/general/min_total)

 - use_subtotal (free_shipping_indicator/general/use_subtotal)

 - subtotal_includes_discount (free_shipping_indicator/general/subtotal_includes_discount)


## Specifications




## Attributes



