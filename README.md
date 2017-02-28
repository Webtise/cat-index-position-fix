# Webtise - Cat Index Position Fix
An extension to fix an error we have come accross quite a few times in Magento 1. With Flat Product enabled, when using any block that makes a call to *addAttributeToSort()* causes the following error:

# Installation

If your using composer with your Magento 1 installation:

- Add the Magento Composer Installer:

        composer require magento/magento-composer-installer
     
- Add the VCS repository: So that composer can find the module. Add the following lines in your composer.json

        "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Webtise/cat-index-position-fix"
        }],
        
- Add the module to composer:

        composer require webtise/cat-index-position-fix

- Clear cache

If you aren't using composer with Magento 1, simply download the extension and extract the files into your Magento installation and then clear the cache.

#Usage

The extension rewrites *Mage_Catalog_Model_Resource_Product_Collection* so once installed it will kick in straight away without any need to configure.

#Support

If you have any issues with this extension, open an issue on [GitHub](https://github.com/Webtise/cat-index-position-fix/issues).

#Contribution

Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

#License

[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

#Copyright

&copy; 2017 Webtise Ltd
