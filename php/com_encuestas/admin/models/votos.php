<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modellist');

/*
 * Modelo Votos
 */
class EncuestasModelVotos extends JModelList
{
  /*
   * Los metodos getItems() y getPagination() estan definidos en la clase
   * JModelList y no hace falta redefinirlos aqui.
   */

  /*
   * Metodo para construir una sentencia SQL para cargar los datos
   * de la lista.
   *
   * @return      string  Una consulta SQL
   */
  protected function getListQuery()
  {
    $db =& JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,id_encuesta,id_elemento_encuesta,id_sesion,fecha');
    $query->from('#__votos');
    return $query;
  }
}
