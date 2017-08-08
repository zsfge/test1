<?php
class Astralweb_Faq_Block_Adminhtml_Category_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();

		$this->_objectId = 'id';
		$this->_blockGroup = 'awfaq';
		$this->_controller = 'adminhtml_category';
		$this->_headerText = 'Faq Category';

		$this->_updateButton('save', 'label', 'Save Faq Category');
		$this->_updateButton('delete', 'label', 'Delete Faq Category'); 
	}
}