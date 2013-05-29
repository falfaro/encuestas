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
    // Establece la vista por defecto.
    $input = JFactory::getApplication()->input;
    $input->set('view', $input->getCmd('view', 'Votos'));
    parent::display($cachable);
  }
}
