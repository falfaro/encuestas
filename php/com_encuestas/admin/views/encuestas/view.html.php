<?php
defined('_JEXEC') or die('Restricted access');
 
jimport( 'joomla.application.component.view' );
jimport( 'joomla.html.pagination' );


class EncuestasViewEncuestas extends JView
{

  function display($tpl = null)
  {
    // Toolbar
    JToolBarHelper::title( JText::_( 'COM_ENCUESTAS_ENCUESTAS' ), 'generic.png' );
    JToolBarHelper::addNewX('encuesta.add');
    JToolBarHelper::editListX('encuesta.edit');
    JToolBarHelper::deleteList( JText::_( 'COM_ENCUESTAS_ENCUESTAS_CONFIRM_DELETE' ), 'encuestas.delete' );

    $this->pagination = $this->get('Pagination');
    $this->items = $this->get('Items');
    $this->state = $this->get('State');

    parent::display($tpl);
  }
}
