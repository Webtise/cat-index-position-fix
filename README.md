# Webtise - Cat Index Position Fix
An extension to fix an error we have come accross quite a few times in Magento 1. With Flat Product enabled, when using any block that makes a call to *addAttributeToSort()* causes the following error:
```
"SQLSTATE[42S22]: Column not found: 1054 Unknown column 'cat_index_position' in 'order clause', query was: SELECT DISTINCT `e`.`attribute_set_id` FROM `catalog_product_flat_{{STORE_ID}}` AS `e`
 INNER JOIN `catalog_category_product_index` AS `cat_index` ON cat_index.product_id=e.entity_id AND cat_index.store_id={{STORE_ID}} AND cat_index.visibility IN(2, 4) AND cat_index.category_id = '{{CATEGORY_ID}}' AND cat_index.is_parent=1
 INNER JOIN `catalog_product_index_price` AS `price_index` ON price_index.entity_id = e.entity_id AND price_index.website_id = '1' AND price_index.customer_group_id = 0 ORDER BY `cat_index_position` ASC, `cat_index`.`position` ASC LIMIT 12"
```

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

# Usage

The extension rewrites *Mage_Catalog_Model_Resource_Product_Collection* so once installed it will kick in straight away without any need to configure.

# Support

If you have any issues with this extension, open an issue on [GitHub](https://github.com/Webtise/cat-index-position-fix/issues).

# Contribution

Any contribution is highly appreciated. The best way to contribute code is to open a [pull request on GitHub](https://help.github.com/articles/using-pull-requests).

# License

[OSL - Open Software Licence 3.0](http://opensource.org/licenses/osl-3.0.php)

# Copyright

&copy; 2017 Webtise Ltd
