<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');
 
/**
 * Vista Encuestas
 */
class EncuestasViewEncuestas extends JView
{
  /**
   * Metodo display() de la vista Encuestas
   * @param   string  $tpl  Nombre del archivo de plantilla; busca
   *                        automaticamente en todos los directorios de
   *                        plantillas.
   *
   * @return  mixed         Una cadena, o un objeto JError en caso de error.
   */
  function display($tpl = null) 
  {
    // Obtiene datos acerca del modelo
    $encuestas = $this->get('Items');
    $paginacion = $this->get('Pagination');
 
    // Comprueba si han habido errores.
    if (count($errors = $this->get('Errors'))) 
      {
	JError::raiseError(500, implode('<br />', $errors));
	return false;
      }

    // Asigna datos a la vista.
    $this->encuestas = $encuestas;
    $this->paginacion = $paginacion;
 
    // Incluye la barra de herramientas.
    $this->addToolBar();
 
    // Muestra la plantilla.
    parent::display($tpl);
  }
 
  /**
    * Configura la barra de herramientas.
    */
  protected function addToolBar() {
    JToolBarHelper::title('Gestion de encuestas');
    JToolBarHelper::deleteList('', 'encuestas.delete');
    JToolBarHelper::editList('encuesta.edit');
    JToolBarHelper::addNew('encuesta.add');
  }
}
