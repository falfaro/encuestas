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
    $id_encuesta = JRequest::getVar('id',  1);
    $db =& JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,nombre,descripcion,fecha_inicio,fecha_fin');
    $query->from('#__encuestas');
    $query->where('id=' . $id_encuesta);
    $db->setQuery($query);
    $encuesta = $db->loadObject();

    $fecha =& JFactory::getDate();
    if($encuesta->fecha_fin < $fecha) {
      // La encuesta esta cerrada y no permite ser votada
      $encuesta->votos = $this->cargarVotos($id_encuesta);
      $encuesta->mensaje = "No se puede votar: la encuesta esta cerrada.";
      $encuesta->encuestaCerrada = true;
      return $encuesta;
    }

    // Determina si esta sesion de usuario ya ha votado en esta
    // encuesta.
    $encuesta->id_sesion =  JFactory::getSession()->getId();
    $query = $db->getQuery(true);
    $query->select("count(*)");
    $query->from("#__votos");
    $query->where("id_encuesta=$id_encuesta");
    $query->where("id_sesion='$encuesta->id_sesion'");
    $db->setQuery($query);

    if($db->loadResult() != 0) {
      // El usuario ya ha votado con anterioridad.
      $encuesta->votos = $this->cargarVotos($id_encuesta);
      $encuesta->encuestaCerrada = true;
      $encuesta->mensaje = "No se puede votar: ya se ha votado con anterioridad.";
      return $encuesta;
    }

    // Carga los elementos que conforman la encuesta para permitir la
    // votacion.
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__elementos_encuestas');
    $query->where('id_encuesta=' . $id_encuesta);
    $db->setQuery($query);
    $encuesta->elementos = $db->loadObjectList();
    $encuesta->encuestaCerrada = false;
    $encuesta->mensaje = "";
    return $encuesta;
  }

  public function cargarVotos($id_encuesta) {
    $db =& JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('e.id, e.nombre, count(v.id) as numero');
    $query->from('#__elementos_encuestas e');
    $query->leftJoin('#__votos v ON v.id_elemento_encuesta = e.id');
    $query->where('e.id_encuesta=' . $id_encuesta);
    $query->group('e.id');
    $query->order('numero');
    $db->setQuery($query);
    return $db->loadObjectList();
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
