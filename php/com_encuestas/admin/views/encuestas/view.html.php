<?php
defined('_JEXEC') or die('Restricted access');
 
jimport('joomla.application.component.view');


class EncuestasViewEncuestas extends JViewLegacy
{
  // Atributos utilizados por la vista y las plantillas relacionadas.
  protected $canDo;
  protected $items;
  protected $pagination;
  protected $state;

  function display($tpl = null) {
    //    // Toolbar
    //    JToolBarHelper::title('Encuestas', 'generic.png' );
    //    JToolBarHelper::addNewX('encuesta.add');
    //    JToolBarHelper::editListX('encuesta.edit');
    //    JToolBarHelper::deleteList('Confirmar borrado', 'encuestas.delete' );

    // Almacena el nivel de acceso que el usuario actual tiene sobre este
    // componente.
    $this->canDo = EncuestasHelper::getActions();

    // Almacena los elementos necesarios para mostrar la lista de encuestas,
    // asi como permitir la paginacion.
    $this->pagination = $this->get('Pagination');
    $this->items = $this->get('Items');
    $this->state = $this->get('State');

    // Configura la barra de herramientas
    $this->addToolBar();

    parent::display($tpl);
  }

  /*
   * Configura la barra de herramientas
   */
  protected function addToolBar() {
    JToolBarHelper::title('Administracion de Encuestas', 'encuestas');
    if ($this->canDo->get('core.create')) {
      JToolBarHelper::addNew('encuestas.add', 'JTOOLBAR_NEW');
    }
    if ($this->canDo->get('core.edit')) {
      JToolBarHelper::editList('encuestas.edit', 'JTOOLBAR_EDIT');
    }
    if ($this->canDo->get('core.delete')) {
      JToolBarHelper::deleteList('', 'encuestas.delete', 'JTOOLBAR_DELETE');
    }
    if ($this->canDo->get('core.admin')) {
      JToolBarHelper::divider();
      JToolBarHelper::preferences('com_encuestas');
    }
  }
}
