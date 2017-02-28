<?php
/**
 * Created by PhpStorm.
 * User: joshcarter
 * Date: 28/02/2017
 * Time: 15:37
 */

class Webtise_CatIndexPositionFix_Model_Resource_Product_Collection extends Mage_Catalog_Model_Resource_Product_Collection
{
    /**
     * Add attribute to sort order
     *
     * @param string $attribute
     * @param string $dir
     * @return Mage_Catalog_Model_Resource_Product_Collection
     *
     * @webtise - changed cat_index_position to cat_index.position in order clause - line 28
     */
    public function addAttributeToSort($attribute, $dir = self::SORT_ORDER_ASC)
    {
        if ($attribute == 'position') {
            if (isset($this->_joinFields[$attribute])) {
                $this->getSelect()->order($this->_getAttributeFieldName($attribute) . ' ' . $dir);
                return $this;
            }
            if ($this->isEnabledFlat()) {
                $this->getSelect()->order("cat_index.position {$dir}");
            }
            // optimize if using cat index
            $filters = $this->_productLimitationFilters;
            if (isset($filters['category_id']) || isset($filters['visibility'])) {
                $this->getSelect()->order('cat_index.position ' . $dir);
            } else {
                $this->getSelect()->order('e.entity_id ' . $dir);
            }

            return $this;
        } elseif($attribute == 'is_saleable'){
            $this->getSelect()->order("is_saleable " . $dir);
            return $this;
        }

        $storeId = $this->getStoreId();
        if ($attribute == 'price' && $storeId != 0) {
            $this->addPriceData();
            $this->getSelect()->order("price_index.min_price {$dir}");

            return $this;
        }

        if ($this->isEnabledFlat()) {
            $column = $this->getEntity()->getAttributeSortColumn($attribute);

            if ($column) {
                $this->getSelect()->order("e.{$column} {$dir}");
            }
            else if (isset($this->_joinFields[$attribute])) {
                $this->getSelect()->order($this->_getAttributeFieldName($attribute) . ' ' . $dir);
            }

            return $this;
        } else {
            $attrInstance = $this->getEntity()->getAttribute($attribute);
            if ($attrInstance && $attrInstance->usesSource()) {
                $attrInstance->getSource()
                    ->addValueSortToCollection($this, $dir);
                return $this;
            }
        }

        return parent::addAttributeToSort($attribute, $dir);
    }
}