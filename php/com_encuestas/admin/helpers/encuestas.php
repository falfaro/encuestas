<?php
defined('_JEXEC') or die;
 
/*
 * Componente de ayuda.
 */
abstract class EncuestasHelper {
 
  /*
   * Determina que acciones puede ejecutar el usuario actual basandose en
   * su nivel de acceso.
   */
  public static function getActions() {
    jimport('joomla.access.access');
    $user   = JFactory::getUser();
    $result = new JObject;
 
    $actions = JAccess::getActions('com_encuestas', 'component');
 
    foreach ($actions as $action) {
      $result->set($action->name, $user->authorise($action->name, 'com_encuestas'));
    }
 
    return $result;
  }
}
