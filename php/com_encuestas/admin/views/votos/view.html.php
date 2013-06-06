<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');
 
/**
 * Vista Votos
 */
class EncuestasViewVotos extends JView
{
  // Atributos utilizados por la vista y las plantillas relacionadas.
  protected $canDo;
  protected $votos;
  protected $pagination;

  /*
   * Metodo display() de la vista Votos
   * @param   string  $tpl  Nombre del archivo de plantilla; busca
   *                        automaticamente en todos los directorios de
   *                        plantillas.
   *
   * @return  mixed         Una cadena, o un objeto JError en caso de error.
   */
  function display($tpl = null) {
    // Almacena el nivel de acceso que el usuario actual tiene sobre este
    // componente.
    $this->canDo = EncuestasHelper::getActions();

    // Obtiene datos acerca del modelo
    $votos = $this->get('Items');
    $pagination = $this->get('Pagination');
 
    // Comprueba si han habido errores.
    if (count($errors = $this->get('Errors'))) 
      {
	JError::raiseError(500, implode('<br />', $errors));
	return false;
      }

    // Asigna datos a la vista.
    $this->votos = $votos;
    $this->pagination = $pagination;
 
    // Incluye la barra de herramientas.
    $this->addToolBar();
 
    // Muestra la plantilla.
    parent::display($tpl);
  }
 
  /*
   * Configura la barra de herramientas
   */
  protected function addToolBar() {
    JToolBarHelper::title('Administracion de votos', 'encuestas');
    if ($this->canDo->get('core.create')) {
      JToolBarHelper::addNew('voto.add', 'JTOOLBAR_NEW');
    }
    if ($this->canDo->get('core.edit')) {
      JToolBarHelper::editList('voto.edit', 'JTOOLBAR_EDIT');
    }
    if ($this->canDo->get('core.delete')) {
      JToolBarHelper::deleteList('', 'votos.delete', 'JTOOLBAR_DELETE');
    }
    if ($this->canDo->get('core.admin')) {
      JToolBarHelper::divider();
      JToolBarHelper::preferences('com_encuestas');
    }
  }
}
