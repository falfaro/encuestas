<?php
defined('_JEXEC') or die('Restricted Access');
dump($this->votos, 'Votos');
?>
<tr>
  <th width="5">ID</th>
  <th width="20">
    <input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count($this->votos); ?>);" />
  </th>
  <th>ID encuesta</th>
  <th>ID elemento encuesta</th>
  <th>ID sesion</th>
  <th>Fecha</th>
</tr>
