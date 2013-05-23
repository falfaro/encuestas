<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by Encuestas. It will
// instantiate a controller object of a class named EncuestasController.
// Joomla will look for the declaration of that class in an aptly named
// file called controller.php (it's a default behavior).
$controller = JController::getInstance('Encuestas');
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
// Redirect if set by the controller 
$controller->redirect();
