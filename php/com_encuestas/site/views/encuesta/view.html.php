<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

/**
 * Vista detallada de una encuesta.
 */
class EncuestasViewEncuesta extends JView
{
  // Overwriting JView display method
  function display($tpl = null) 
  {
    // Incorpora los datos de la encuesta, obtenidos del modelo, a la vista.
    // Estos datos estaran disponibles para ser utilizados por la plantilla.
    $this->encuesta = $this->get('Encuesta');

    // Muestra los posibles errores que se hayan encontrado.
    if (count($errors = $this->get('Errors'))) 
      {
	JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
	return false;
      }

    // Muestra la vista.
    parent::display($tpl);
  }
}
