<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla view library
jimport('joomla.application.component.view');
 
/**
 * HelloWorlds View
 */
class EncuestasViewVotos extends JView
{
  /**
   * Metodo display() de la vista Votos
   * @param   string  $tpl  Nombre del archivo de plantilla; busca
   *                        automaticamente en todos los directorios de
   *                        plantillas.
   *
   * @return  mixed  Una cadena, o un objeto JError en caso de error.
   */
  function display($tpl = null) 
  {
    // Obtiene datos acerca del modelo
    $votos = $this->get('Votos');
    $paginacion = $this->get('Pagination');
 
    // Comprueba si han habido errores.
    if (count($errors = $this->get('Errors'))) 
      {
	JError::raiseError(500, implode('<br />', $errors));
	return false;
      }

    // Asigna datos a la vista.
    $this->votos = $votos;
    $this->paginacion = $paginacion;
 
    // Incluye la barra de herramientas.
    $this->addToolBar();
 
    // Muestra la plantilla.
    parent::display($tpl);
  }
 
  /**
   * Configura la barra de herramientas.
   */
  protected function addToolBar() 
  {
    JToolBarHelper::title(JText::_('COM_ENCUESTAS_MANAGER_VOTOS'));
    JToolBarHelper::deleteList('', 'votos.borrar');
    JToolBarHelper::editList('voto.editar');
    JToolBarHelper::addNew('voto.insertar');
  }
}
