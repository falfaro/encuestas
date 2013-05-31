<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.modellist' );
 

class EncuestasModelElementosEncuestas extends JModelList
{
  function getListQuery()
  {
    $id_encuesta = JRequest::getInt('id');

    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,id_encuesta,nombre,descripcion');
    $query->from('#__elementos_encuestas');
    $query->where('id_encuesta = ' . $id_encuesta);

    return $query;
  }
}
