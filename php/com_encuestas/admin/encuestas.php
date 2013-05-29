<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');
 
// Obtiene una instancia del controlador cuyo nombre esta prefijado por el
// literal Encuestas.
$controller =& JController::getInstance('Encuestas');
 
// Obtiene la tarea que se ha de ejecutar
$jinput = JFactory::getApplication()->input;
$task = $jinput->get('task', "", 'STR' );

// Ejecuta la tarea solicitada.
$controller->execute($task);
 
// Fuerza una redireccion si asi lo desea el controlador.
$controller->redirect();
