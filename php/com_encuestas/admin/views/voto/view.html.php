<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');
 
/**
 * Vista Voto
 */
class EncuestasViewVoto extends JView
{
  /**
   * Metodo display de la vista Voto
   * @return void
   */
  public function display($tpl = null) 
  {
    // get the Data
    $form = $this->get('Form');
    $item = $this->get('Item');
 
    // Check for errors.
    if (count($errors = $this->get('Errors'))) 
      {
	JError::raiseError(500, implode('<br />', $errors));
	return false;
      }
    // Assign the Data
    $this->form = $form;
    $this->item = $item;
 
    // Set the toolbar
    $this->addToolBar();
 
    // Display the template
    parent::display($tpl);
  }
 
  /**
   * Setting the toolbar
   */
  protected function addToolBar() 
  {
    $input = JFactory::getApplication()->input;
    $input->set('hidemainmenu', true);
    $isNew = ($this->item->id == 0);
    JToolBarHelper::title($isNew ? 'Nuevo voto' : 'Editar voto');
    JToolBarHelper::save('voto.save');
    JToolBarHelper::cancel('voto.cancel', $isNew ? 'JTOOLBAR_CANCEL'
			   : 'JTOOLBAR_CLOSE');
  }
}
