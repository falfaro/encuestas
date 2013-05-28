<?php
/*
 * @package    com_encuestas
 * @copyright  2013 Felipe Alfaro Solana
 * @license    GNU/GPL http://www.gnu.org/copyleft/gpl.html
 * @link       http:/blog.felipe-alfaro.com/
 */

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
    // Obtiene el identificador de encuesta y el identificador de la opcion
    // que se esta votando.
    $id_encuesta          = JRequest::getInt('id', 0);
    $id_elemento_encuesta = JRequest::getInt('id_voto', 0);

    if (!$id_encuesta || !$id_elemento_encuesta) {
      // El identificador de encuesta o el identificador del elemento de la
      // encuesta no han sido suministrados en la peticion HTTP.
      $msg = "<p>La informacion suministrada para realizar el voto es incompleta.</p>";
      $tom = "error";
    } else {
      $id_sesion = JFactory::getSession()->getId();
      $fecha     =& JFactory::getDate();
      $model = $this->getModel('Encuesta');

      $msg = $model->votar($id_encuesta, $id_elemento_encuesta, $id_sesion, $fecha);
      if ($msg == null) {
	// El voto se ha insertado en la base de datos correctamente.
	$msg = "<p>Gracias! Se ha votado correctamente.<p>";
	$tom = "";
      } else {
	// Ha ocurrido un error al insertar el voto en la base de datos.
	$msg = "<p>Se ha producido un error al votar: $msg.</p>";
	$tom = "error";
      }
    }
    // Solicita la redireccion al controlador, usando la vista 'encuesta' para
    // mostrar la informacion de la encuesta. Si el voto se ha realizado de forma
    // correcta, se mostrara el numero de votos de cada opcion. Si el voto no se
    // ha podido realizar, se mostrara el error y se permitira al usuario volver a
    // intentar el voto.
    $this->setRedirect(JRoute::_("index.php?option=com_encuestas&view=encuesta&id=$id_encuesta"), $msg, $tom);
  }
}
