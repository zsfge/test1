<?php
class Astralweb_Faq_Model_Resource_Faqs extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('awfaq/faqs', 'entity_id');
    }
}