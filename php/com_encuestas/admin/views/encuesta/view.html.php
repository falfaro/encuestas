<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );
 
class EncuestasViewEncuesta extends JView
{
  protected $canDo;
  protected $elementosEncuestas;
  protected $elementosEncuestasToolBar;
  protected $form;
  protected $item;

  function display($tpl = null) {
    // Almacena el nivel de acceso que el usuario actual tiene sobre este
    // componente.
    $this->canDo = EncuestasHelper::getActions();

    // Obtiene los datos del modelo
    $this->item = $this->get('Item');
    $this->form = $this->get('Form');
    $this->elementosEncuestas = $this->get('Items', 'ElementosEncuestas');

    // Configura la barra de herramientas
    $isNew = ($this->item->id < 1);
    $this->addToolBar($isNew);

    parent::display($tpl);

    $document = JFactory::getDocument();
    $document->addScript(JURI::root() .
			 '/administrator/components/com_encuestas/models/forms/encuesta.js');
    $document->addScript(JURI::root() . 
			 '/administrator/components/com_encuestas/models/forms/validation.js');
    JText::script('COM_ENCUESTAS_VALIDATION_ERROR');
    }

  /*
   * Configura la barra de herramientas
   */
  protected function addToolBar($isNew) {
    // Deshabilita el menu principal
    JRequest::setVar('hidemainmenu', true);

    if ($isNew) {
      JToolBarHelper::title('Nueva encuesta', 'generic.png' );
    } else {
      JToolBarHelper::title('Editar encuesta', 'generic.png' );
    }

    // Configura las acciones de la barra de herramientas anidada, asociada a
    // los elementos de la encuesta
    $message = JText::_('JLIB_HTML_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST');
    $toolBar = new JToolBar();

    if ($this->canDo->get('core.create')) {
      JToolBarHelper::save2new('encuesta.save2new');
      $html = "<a class=\"toolbar\" onclick=\"Joomla.submitbutton('elementoencuesta.add')\" href=\"#\">";
      $html .= "<span class=\"icon-32-new\"></span>";
      $html .= JText::_('JTOOLBAR_NEW');
      $html .= "</a>\n";    	
      $toolBar->appendButton('Custom', $html, 'new');
    }
    if ($this->canDo->get('core.edit')) {
      JToolBarHelper::apply('encuesta.apply');
      JToolBarHelper::save('encuesta.save');
      JToolBarHelper::cancel('encuesta.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');
      $html = "<a class=\"toolbar\" onclick=\"if (document.elementosEncuestasForm.boxchecked.value==0){alert('$message');}else{ Joomla.submitform('elementoencuesta.edit', document.elementosEncuestasForm)}\" href=\"#\">";
      $html .= "<span class=\"icon-32-edit\"></span>";
      $html .= JText::_('JTOOLBAR_EDIT');
      $html .= "</a>\n";
      $toolBar->appendButton('Custom', $html, 'edit');
    }
    if ($this->canDo->get('core.delete')) {
      $msg = 'Confirmar borrado de elemento de la encuesta';
      $html = "<a class=\"toolbar\" onclick=\"if (document.elementosEncuestasForm.boxchecked.value==0){alert('$message');}else{if (confirm('$msg')){Joomla.submitform('elementosencuestas.delete', document.elementosEncuestasForm);}}\" href=\"#\">";
      $html .= "<span class=\"icon-32-delete\"></span>";
      $html .= JText::_('JTOOLBAR_DELETE');
      $html .= "</a>\n";
      $toolBar->appendButton('Custom', $html, 'delete');
    }
    if ($this->canDo->get('core.admin')) {
      JToolBarHelper::divider();
      JToolBarHelper::preferences('com_encuestas');
    }

    $this->elementosEncuestasToolBar = $toolBar->render();
  }
}
