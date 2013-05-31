<?php
defined('_JEXEC') or die();
jimport( 'joomla.application.component.modellist' );
 

class EncuestasModelEncuestas extends JModelList
{
  public function __construct($config = array())
  {
    if (empty($config['filter_fields'])) {
      $config['filter_fields'] = array('id', 'nombre', 'descripcion', 'fecha_inicio', 'fecha_fin');
    }

    parent::__construct($config);
  }
	
	
  function getListQuery()
  {
    $db = JFactory::getDBO();
    $query = $db->getQuery(true);
    $query->select('id,nombre,descripcion,fecha_inicio,fecha_fin');
    $query->from('#__encuestas');

    // Filter by search in title
    $search = $this->getState('filter.search');
    if (!empty($search)) {
      $search = $db->Quote('%'.$db->escape($search, true).'%');
      $query->where('((nombre LIKE '.$search.') OR (descripcion LIKE '.$search.'))');
    }
    	
    $query->order($this->getState('list.ordering', 'id').' '.$this->getState('list.direction', 'ASC'));

    return $query;
  }
    
  protected function populateState($ordering = null, $direction = null)
  {
    // Load the filter state.
    $search = $this->getUserStateFromRequest($this->context.'.filter.search', 
					     'filter_search');
    $this->setState('filter.search', $search);

    // List state information.
    parent::populateState($ordering, $direction);
  }
}
