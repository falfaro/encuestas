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
if ($this->openPolls)
  {
?>
<table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
  </tr>
  <?php foreach($this->openPolls as $openPoll): ?>
    <?php
      $link = JRoute::_( "index.php?option=com_encuestas&view=encuesta&id={$openPoll->id}" );
    ?>
  <tr>
     <td><a href="<?php echo $link; ?>"><?php echo $openPoll->id; ?></a></td>
     <td><?php echo $openPoll->nombre; ?></td>
  </tr>
  <?php endforeach; ?>
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
