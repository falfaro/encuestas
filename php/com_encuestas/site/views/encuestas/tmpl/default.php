<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<style type="text/css">
  table {
    border-collapse:separate;
    border-spacing: 5px;
  }
  th, td { padding: 5px; }
</style>

<h2><?php echo $this->msg; ?></h2>

<?php
if ($this->open_polls)
  {
?>
<table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
  </tr>
<?php
    foreach($this->open_polls as $open_poll)
      {
	echo "<tr>";
	echo "<td>$open_poll->id</td>";
	echo "<td>$open_poll->nombre</td>";
	echo "</tr>";
      }
?>
</table>
<?php
  }
else
  {
?>
<p>No hay encuestas disponibles abiertas.</p>
<?php
  }
?>
