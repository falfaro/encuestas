<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');
 
/**
 * Controlador general del componente Encuestas
 */
class EncuestasController extends JController
{
  /**
   * Tarea display
   *
   * @return void
   */
  function display($cachable = false) 
  {
    // Establece la vista por efecto a 'votos' (la lista de votos de todas
    // las encuestas del sistema) en caso de que fuera necesario.
    $input = JFactory::getApplication()->input;
    $view = $input->getCmd('view');
    if (empty($view)) {
      $input->set('view', 'votos');
    }
    parent::display($cachable);
  }
}
