<?php
class Mitac_Faq_Block_Adminhtml_Faqs_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
protected function _prepareForm()
{
$form = new Varien_Data_Form();
$this->setForm($form);
$fieldset = $form->addFieldset('faqs_form', array('legend' => 'Faq information'));
$fieldset->addField('title', 'text', array(
'label' => 'Title',
'class' => 'required-entry',
'required' => true,
'name' => 'title',
));
$fieldset->addField('content', 'text', array(
'label' => 'Content',
'class' => 'required-entry',
'required' => true,
'name' => 'content',
));
$fieldset->addField('status', 'select', array(
'label' => Mage::helper('mitacfaq')->__('Enable'),
'name' => 'status',
'values' =>
Mage::getSingleton('adminhtml/system_config_source_yesno')->toOptionArray()
));
if (Mage::getSingleton('adminhtml/session')->getFaqsData()) {
$form->setValues(Mage::getSingleton('adminhtml/session')->getFaqsData());
Mage::getSingleton('adminhtml/session')->getFaqsData(null);
} elseif (Mage::registry('faqs_data')) {
$form->setValues(Mage::registry('faqs_data')->getData());
}
return parent::_prepareForm();
}
}