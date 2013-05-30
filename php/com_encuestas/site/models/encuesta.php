<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');
 
/**
 * Modelo para los detalles de una encuesta
 */
class EncuestasModelEncuesta extends JModelItem
{
  /**
   * Metodo para recuperar los detalles de una encuesta.
   */
  public function getEncuesta()
  {
    // Carga los detalles de la encuesta.
    $id = JRequest::getVar('id',  1);
    $db =& JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__encuestas');
    $query->where('id=' . $id);
    $db->setQuery($query);
    $encuesta = $db->loadObject();

    // Determina si esta sesion de usuario ya ha votado en esta
    // encuesta.
    $encuesta->id_sesion =  JFactory::getSession()->getId();
    $query = $db->getQuery(true);
    $query->select("count(*)");
    $query->from("#__votos");
    $query->where("id_encuesta=$id");
    $query->where("id_sesion='$encuesta->id_sesion'");
    $db->setQuery($query);

    $encuesta->votoPropio = ($db->loadResult() == 0) ? false : true;

    if($encuesta->votoPropio) {
      // El usuario ya ha votado. Carga informacion sobre el numero de
      // votos de cada posible elemento de esta encuesta.
      $query = $db->getQuery(true);
      $query->select('e.id, e.nombre, count(v.id) as numero');
      $query->from('#__elementos_encuestas e');
      $query->leftJoin('#__votos v ON v.id_elemento_encuesta = e.id');
      $query->where('e.id_encuesta=' . $id);
      $query->group('e.id');
      $query->order('numero');
      $db->setQuery($query);
      $encuesta->votos = $db->loadObjectList();
    } else {
      // Carga los elementos que conforman la encuesta para permitir l
      // votacion.
      $query = $db->getQuery(true);
      $query->select('*');
      $query->from('#__elementos_encuestas');
      $query->where('id_encuesta=' . $id);
      $db->setQuery($query);
      $encuesta->elementos = $db->loadObjectList();
    }

    return $encuesta;
  }

  public function votar($id_encuesta, $id_elemento_encuesta, $id_sesion, $fecha) {
    $db =& JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->insert("#__votos");
    $query->columns("id_elemento_encuesta,id_encuesta,id_sesion,fecha");
    $query->values("$id_elemento_encuesta,$id_encuesta,'$id_sesion','$fecha'");
    $db->setQuery($query);
    if (!$db->query()) {
      return $db->stderr();
    }
    return null;
  }
}
