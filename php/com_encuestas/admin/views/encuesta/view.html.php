<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.view' );
 
class EncuestasViewEncuesta extends JView
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
      JToolBarHelper::title('Nueva encuesta', 'generic.png' );
    } else {
      JToolBarHelper::title('Editar encuesta', 'generic.png' );
    }
    JToolBarHelper::apply('encuesta.apply');
    JToolBarHelper::save('encuesta.save');
    JToolBarHelper::save2new('encuesta.save2new');
    JToolBarHelper::cancel('encuesta.cancel', $isNew ? 'JTOOLBAR_CANCEL' : 'JTOOLBAR_CLOSE');

    // Tasks actions
    $message = JText::_('JLIB_HTML_PLEASE_MAKE_A_SELECTION_FROM_THE_LIST');
    	 
    $objElementosEncuestasToolBar = new JToolBar();
    $html = "<a class=\"toolbar\" onclick=\"Joomla.submitform('elementoencuesta.add', document.elementosEncuestasForm)\" href=\"#\">";
    $html .= "<span class=\"icon-32-new\"></span>";
    $html .= JText::_('JTOOLBAR_NEW');
    $html .= "</a>\n";    	
    $objElementosEncuestasToolBar->appendButton('Custom', $html, 'new');
    $html = "<a class=\"toolbar\" onclick=\"if (document.elementosEncuestasForm.boxchecked.value==0){alert('$message');}else{ Joomla.submitform('elementoencuesta.edit', document.elementosEncuestasForm)}\" href=\"#\">";
    $html .= "<span class=\"icon-32-edit\"></span>";
    $html .= JText::_('JTOOLBAR_EDIT');
    $html .= "</a>\n";
    $objElementosEncuestasToolBar->appendButton('Custom', $html, 'edit');
    $msg = 'Confirmar borrado de elemento de la encuesta';
    $html = "<a class=\"toolbar\" onclick=\"if (document.elementosEncuestasForm.boxchecked.value==0){alert('$message');}else{if (confirm('$msg')){Joomla.submitform('elementosencuestas.delete', document.elementosEncuestasForm);}}\" href=\"#\">";
    $html .= "<span class=\"icon-32-delete\"></span>";
    $html .= JText::_('JTOOLBAR_DELETE');
    $html .= "</a>\n";
    $objElementosEncuestasToolBar->appendButton('Custom', $html, 'delete');
    	 
    $this->item = $item;
    $this->form = $form;
    $this->elementosEncuestas = $this->get( 'Items', 'ElementosEncuestas' );
    $this->elementosEncuestasToolBar = $objElementosEncuestasToolBar->render();
    	 
    parent::display($tpl);
    	
    $document = JFactory::getDocument();
    $document->addScript(JURI::root() .
			 '/administrator/components/com_encuestas/models/forms/encuesta.js');
    $document->addScript(JURI::root() . 
			 '/administrator/components/com_encuestas/models/forms/validation.js');
    JText::script('COM_ENCUESTAS_VALIDATION_ERROR');
    }
}
