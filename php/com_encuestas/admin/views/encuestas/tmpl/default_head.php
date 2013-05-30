<?php
defined('_JEXEC') or die('Restricted Access');
?>
<tr>
  <th width="5">ID</th>
  <th width="20">
    <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->encuestas); ?>);" />
  </th>
  <th>Nombre</th>
  <th>Descripcion</th>
  <th>Fecha inicio</th>
  <th>Fecha fin</th>
</tr>
