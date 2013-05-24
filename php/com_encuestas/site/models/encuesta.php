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
  public function getPoll()
  {
    // Carga los detalles de la encuesta.
    $pollId = JRequest::getVar('pollId',  1);
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__encuestas');
    $query->where('id=' . $pollId);
    $db->setQuery($query);
    $encuesta = $db->loadObject();

    // Carga los elementos que conforman la encuesta.
    $query = $db->getQuery(true);
    $query->select('*');
    $query->from('#__elementos_encuestas');
    $query->where('id_encuesta=' . $pollId);
    $db->setQuery($query);
    $encuesta->elementos = $db->loadObjectList();

    /*
    $user = JFactory::getUser();
    if($user) {
      // Determina si el usuario ya ha votado en esta encuesta.
      $query = $db->getQuery(true);
      $query->select('id');
      $query->from('#__votos');
      $query->where('id_encuesta=' . $pollId);
      $query->where('id_usuario=' . $user->id);
      $db->setQuery($query);
      $encuesta->votos = $db->loadObjectList();
    }
    */
    // Determina si esta sesion de usuario ya ha votado en esta
    // encuesta.
    $query = $db->getQuery(true);
    $query->select('count(*)');
    $query->from('#__votos');
    $query->where('id_encuesta=' . $pollId);
    $query->where('id_sesion=' . JFactory::getSession()->getId());
    $db->setQuery($query);
    $encuesta->votos = $db->loadloadResult();

    return $encuesta;
  }
}
