<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );
 
class EncuestasViewElementoEncuesta extends JView
{

  function display($tpl = null)
  {
    // Get data from the model
    $item = $this->get( 'Item' );
    $form = $this->get( 'Form' );
    $isNew = ($item->id < 1);
		
    // Disable main menu
    JRequest::setVar('hidemainmenu', true);
    // Toolbar
    if ($isNew) {
      JToolBarHelper::title('Nuevo elemento de la encuesta', 'generic.png' );
    } else {
      JToolBarHelper::title('Editar elemento de la encuesta', 'generic.png' );
    }
    JToolBarHelper::apply('elementoencuesta.apply');
    JToolBarHelper::save('elementoencuesta.save');
    JToolBarHelper::save2new('elementoencuesta.save2new');
    JToolBarHelper::cancel('elementoencuesta.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');

    $this->item = $item;
    $this->form = $form;

    parent::display($tpl);

    $document = JFactory::getDocument();
    $document->addScript(JURI::root() . 
			 '/administrator/components/com_encuestas/models/forms/validation.js');
    JText::script('COM_ENCUESTAS_VALIDATION_ERROR');
  }
}
