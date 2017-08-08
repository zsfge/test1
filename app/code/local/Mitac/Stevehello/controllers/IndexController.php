<?php
class Mitac_Stevehello_IndexController extends  Mage_core_Controller_Front_Action
{
	public function indexAction()
	{
	echo 'hello';
	$this->loadLayout();
	$this->renderLayout();
	}
	
	
}