<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

// Obtiene una instancia de la clase controlador cuyo nombre esta prefijado
// con el nombre 'Encuestas'. Esta invocacion creara una instancia de una clase
// denominada EncuestasController, definida en el archivo controller.php.
$controller = JController::getInstance('Encuestas');
// Ejecuta la tarea especificada.
$controller->execute(JRequest::getCmd('task'));
// Fuerza una redireccion si asi lo desea el controlador.
$controller->redirect();
