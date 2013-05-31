<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

/**
 * General Controller of Registry component
 */
class EncuestasController extends JController
{
  public function display($cachable = false, $urlparams = false) {
    // set default view if not set
    JRequest::setVar('view', JRequest::getCmd('view', 'encuestas'));

    $viewName = JRequest::getCmd('view', $this->default_view);
    switch ($viewName) {
    case "encuesta":
      $document = JFactory::getDocument();
      $viewType = $document->getType();
      $viewLayout = JRequest::getCmd('layout', 'default');
				
      $view = $this->getView($viewName, $viewType, '', array('base_path' => $this->basePath, 'layout' => $viewLayout));
				
      // Get/Create the model
      $view->setModel($this->getModel('Encuesta'), true);
      $view->setModel($this->getModel('ElementosEncuestas'));
				
      $view->assignRef('document', $document);
      $view->display();
				
      break;
    default:
      // call parent behavior
      parent::display($cachable, $urlparams);
      break;
    }
  }
}
