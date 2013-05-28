<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * Encuestas Controller
 */
class EncuestasController extends JController {

  public function display() {
    // Establece la vista por efecto a 'encuestas' (la lista de encuestas
    // disponibles) en caso de que fuera necesario.
    $view = JRequest::getCmd('view');
    if (empty($view)) {
      JRequest::setVar('view', 'encuestas');
    }
    parent::display();
  }

  public function votar() {
    // Comprueba que no se este intentando utilizar esta sesion de forma
    // malintencionada.
    //    JRequest::checkToken() or jexit('Invalid Token');

    echo "<p>Votando que es gerundio.</p>";

    //    $mainframe  = JFactory::getApplication();
    $id_encuesta = JRequest::getInt('id', 0);
    $id_voto = JRequest::getInt('id_voto', 0);
    $fecha =& JFactory::getDate();
    //    $poll       =& JTable::getInstance('Poll', 'Table');

    echo "<p>ID encuesta: $id_encuesta";
    echo "<p>ID voto: $id_voto";
    echo "<p>Fecha: $fecha";

    $model = $this->getModel('Encuesta');

    if ($model->votar($poll_id, $option_id, $fecha)) {
      $msg = "<p>Gracias! Se ha votado correctamente.<p>";
      $tom = "";
    } else {
      $msg = "<p>Se ha producido un error al votar.</p>";
      $tom = "error";
    }

    //    $this->setRedirect(JRoute::_("index.php?option=com_encuestas&view=encuesta&id=$id_encuesta"), $msg, $tom);
  }
}
