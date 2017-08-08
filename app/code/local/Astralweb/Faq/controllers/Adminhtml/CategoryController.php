<?php
class Astralweb_Faq_Adminhtml_CategoryController extends Mage_Adminhtml_Controller_action
{
	public function indexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}
	
	public function gridAction()
    {
        $this->loadLayout();
        $this->getResponse()->setBody(
            $this->getLayout()->createBlock('awfaq/adminhtml_category_grid')->toHtml()
        );
    }
	
	public function newAction() 
	{
		$this->_forward('edit');
	}
	
	public function editAction() 
	{
		$id = $this->getRequest()->getParam('id');
		
		if($id){
			$model = Mage::getModel('awfaq/category')->load($id);
			if ($model->getId()){
				Mage::register('faqcategory_data', $model);
			}else{
				$this->_getSession()->addError('FAQ 分類不存在');
                $this->_redirect('*/*/');
			}
		}
	
		$this->loadLayout();
		$this->renderLayout(); 
	}

	public function saveAction() 
	{
		$data = $this->getRequest()->getPost();
		
		if($data)
		{
			
			$model = Mage::getModel('awfaq/category');
			$model->setData($data);
			$model->setId($this->getRequest()->getParam('id'));
			
			try{
				$model->save();

				$this->_getSession()->addSuccess($this->__('The FAQ Category has been saved.'));
			}catch (Exception $e){
				Mage::logException($e);
                $this->_getSession()->addError($e->getMessage());
			}
			
		}
		
		$this->_redirect('*/*/');
	}
	
	public function deleteAction() 
	{
		if ($this->getRequest()->getParam('id') > 0) {
			try {
				$model = Mage::getModel('awfaq/category');

				$model->setId($this->getRequest()->getParam('id'))
				->delete();

				Mage::getSingleton('adminhtml/session')->addSuccess('FAQ Category was successfully deleted');
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}
	
	protected function _isAllowed()
	{
		return Mage::getSingleton('admin/session')->isAllowed('awfaq/awfaq_category');  
	}
}
