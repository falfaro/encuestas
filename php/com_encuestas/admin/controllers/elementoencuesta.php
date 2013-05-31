<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controllerform');
 

class EncuestasControllerElementoEncuesta extends JControllerForm
{
  public function __construct($config = array())
  {
    $this->view_list = 'encuesta';
    parent::__construct($config);
  }

  public function add()
  {
    if (parent::add()) {
      $app = JFactory::getApplication();
      $context = "$this->option.edit.$this->context";
			
      $app->setUserState($context . '.id_encuesta', JRequest::getCmd('id_encuesta'));

      return true;
    }
  }
	
	
  public function cancel($key = null)
  {
    if (parent::cancel($key)) {
      // Set right layout
      $app = JFactory::getApplication();
      $context = "$this->option.edit.$this->context";

      $this->setRedirect(
			 JRoute::_(
				   'index.php?option=' . $this->option . '&view=' . $this->view_list
				   . '&layout=edit'
				   . '&id=' . $app->getUserState($context . '.id_encuesta')
				   . $this->getRedirectToListAppend(), false
				   )
			 );

      return true;
    }

    return false;
  }


  public function save($key = null, $urlVar = null)
  {
    if (parent::save($key, $urlVar)) {
      $task = $this->getTask();

      if ($task == 'save')
	{
	  // Add the master pk and the right layout
	  $app = JFactory::getApplication();
	  $context = "$this->option.edit.$this->context";

	  $this->setRedirect(
			     JRoute::_(
				       'index.php?option=' . $this->option . '&view=' . $this->view_list
				       . '&layout=edit'
				       . '&id=' . $app->getUserState($context . '.id_encuesta')
				       . $this->getRedirectToListAppend(), false
				       )
			     );
	}

      return true;
    }
		
    return false;
  }
}
