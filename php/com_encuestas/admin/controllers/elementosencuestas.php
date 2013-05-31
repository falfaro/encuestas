<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controlleradmin');
 

class EncuestasControllerElementosEncuestas extends JControllerAdmin
{
  public function __construct($config = array())
  {
    $this->view_list = 'encuesta';

    parent::__construct($config);
  }
	
  /**
   * Set default values when no action is specified (ie for cancel)
   */
  public function getModel($name = 'ElementoEncuesta', $prefix = 'EncuestasModel', $config = array())
  {
    return parent::getModel($name, $prefix, $config);
  }

	
  public function delete()
  {
    parent::delete();
		
    $app = JFactory::getApplication();
    $context = "$this->option.edit.task";
		
    $this->setRedirect(JRoute::_('index.php?option=' . $this->option . '&view=' . $this->view_list
				 . '&layout=edit'
				 . '&id=' . $app->getUserState($context . '.id_encuesta'), false));
  }
}
