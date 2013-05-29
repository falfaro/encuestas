<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controlleradmin');
 
/**
 * Controlador Votos
 */
class EncuestasControllerVotos extends JControllerAdmin
{
  /**
   * Proxy para el metodo getModel.
   * @since       2.5
   */
  public function getModel($name = 'Voto', $prefix = 'EncuestasModel') 
  {
    $model = parent::getModel($name, $prefix, array('ignore_request' => true));
    return $model;
  }
}
