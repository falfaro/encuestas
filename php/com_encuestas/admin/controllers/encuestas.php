<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controlleradmin');

/**
 * Controlador Encuestas
 */
class EncuestasControllerEncuestas extends JControllerAdmin
{
  /**
   * Set default values when no action is specified (ie for cancel)
   */
  public function getModel($name = 'Encuesta', $prefix = 'EncuestasModel', $config = array())
  {
    return parent::getModel($name, $prefix, $config);
  }
}
