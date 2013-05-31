<?php 
defined( '_JEXEC' ) or die( 'Restricted access' );

$option = JRequest::getCmd('option');
$view = JRequest::getCmd('view');
$listOrder = $this->state->get('list.ordering');
$listDirn = $this->state->get('list.direction');
?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
  <input type="hidden" name="option" value="<?=$option?>" />
  <input type="hidden" name="task" value="" />
  <input type="hidden" name="view" value="<?=$view?>" />
  <input type="hidden" name="filter_order" value="<?=$listOrder?>" />
  <input type="hidden" name="filter_order_Dir" value="<?=$listDirn?>" />	
  <input type="hidden" name="boxchecked" value="0" />
  <?php echo JHtml::_('form.token'); ?>
    
  <fieldset id="filter-bar">
    <div>
      <label for="filter_search"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
      <input type="text" name="filter_search" id="filter_search" 
             value="<?php echo $this->escape($this->state->get('filter.search')); ?>" 
             title="<?php echo JText::_('COM_ENCUESTAS_RICERCA_ENCUESTAS'); ?>" />
      <button type="submit"><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
      <button type="button" onclick="document.id('filter_search').value='';this.form.submit();">
        <?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>
      </button>
    </div>
  </fieldset>
  <div class="clr"> </div>

    <div id="editcell">	
      <table class="adminlist">
        <thead>
          <tr>
            <th width="1%">
              <input type="checkbox" onclick="Joomla.checkAll(this)"
                     title="<?=JText::_( 'JGLOBAL_CHECK_ALL' )?>" value="" name="checkall-toggle">
            </th>
            <th>
              <?=JHtml::_('grid.sort', 'Nombre', 'nombre', $listDirn, $listOrder); ?>
            </th>
            <th>
              <?=JHtml::_('grid.sort', 'Descripcion', 'descripcion', $listDirn, $listOrder); ?>
            </th>
            <th>
              <?=JHtml::_('grid.sort', 'Fecha inicio', 'fecha_inicio', $listDirn, $listOrder); ?>
            </th>
            <th>
              <?=JHtml::_('grid.sort', 'Fecha fin', 'fecha_fin', $listDirn, $listOrder); ?>
            </th>
            <th>
              <?=JHtml::_('grid.sort', 'JGLOBAL_FIELD_ID_LABEL', 'id', $listDirn, $listOrder); ?>
            </th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <td colspan="6">
              <?=$this->pagination->getListFooter()?>
            </td>
          </tr>
        </tfoot>
        <tbody>
<?
		$k = 0;
		$i = 0;
		foreach ($this->items as &$row)
		{
			$checked = JHTML::_('grid.id', $i++, $row->id );
			$link = JRoute::_( 'index.php?option=' . $option . '&task=encuesta.edit&id=' . $row->id );
?>
				<tr class="row<?=$k?>">
					<td><?=$checked?></td>
					<td>
						<a href="<?=$link?>">
							<?=$row->nombre?>
						</a>
					</td>
					<td>
						<a href="<?=$link?>">
							<?=$row->descripcion?>
						</a>
					</td>
					<td>
						<a href="<?=$link?>">
							<?=$row->fecha_inicio?>
						</a>
					</td>
					<td>
						<a href="<?=$link?>">
							<?=$row->fecha_fin?>
						</a>
					</td>
					<td>
						<a href="<?=$link?>">
							<?=$row->id?>
						</a>
					</td>
				</tr>
<?
			$k = 1 - $k;
		}
?>
			</tbody>
		</table>
	</div>
</form>