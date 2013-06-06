<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );
 

/*
 * Vista ElementoEncuesta
 */
class EncuestasViewElementoEncuesta extends JView
{

  /*
   * Metodo display() de la vista ElementoEncuesta
   * @param   string  $tpl  Nombre del archivo de plantilla; busca
   *                        automaticamente en todos los directorios de
   *                        plantillas.
   *
   * @return  mixed         Una cadena, o un objeto JError en caso de error.
   */
  function display($tpl = null) {
    // Almacena el nivel de acceso que el usuario actual tiene sobre este
    // componente
    $this->canDo = EncuestasHelper::getActions();

    // Obtiene datos acerca del modelo
    $item = $this->get('Item');
    $form = $this->get('Form');

    // Comprueba si han habido errores
    if (count($errors = $this->get('Errors'))) {
      JError::raiseError(500, implode('<br />', $errors));
      return false;
    }

    // Asigna datos a la vista
    $this->form = $form;
    $this->item = $item;
  
    // Configura la barra de herramientas
    $this->addToolBar();

    // Muestra la plantilla
    parent::display($tpl);

    $document = JFactory::getDocument();
    $document->addScript(JURI::root() . 
			 '/administrator/components/com_encuestas/models/forms/validation.js');
    JText::script('COM_ENCUESTAS_VALIDATION_ERROR');
  }

   /*
   * Configura la barra de herramientas
   */
  protected function addToolBar() {
    // Deshabilita el menu principal
    JRequest::setVar('hidemainmenu', true);

    $isNew = ($this->item->id < 1);

    JToolBarHelper::title($isNew ? 'Nuevo elemento de la encuesta' : 'Editar elemento de la encuesta', 'generic.png');

    // Configura las acciones de la barra de herramientas anidada, asociada a
    // los elementos de la encuesta
    if ($this->canDo->get('core.edit')) {
      JToolBarHelper::apply('elementoencuesta.apply');
      JToolBarHelper::save('elementoencuesta.save');
      JToolBarHelper::cancel('elementoencuesta.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
    }
    if ($this->canDo->get('core.admin')) {
      JToolBarHelper::divider();
      JToolBarHelper::preferences('com_encuestas');
    }
  }
}
