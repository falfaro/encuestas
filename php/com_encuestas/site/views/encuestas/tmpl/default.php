<?php
defined('_JEXEC') or die('Restricted access');

if(JDEBUG) {
  dump($this->encuestas, 'Encuestas');
}
?>

<style type="text/css">
  table {
    border-collapse:separate;
    border-spacing: 5px;
  }
  th, td { padding: 5px; }
</style>

<h2>Lista de encuestas disponibles actualmente</h2>

<?php if($this->encuestas): ?>

<table>
  <tr>
    <th>ID</th>
    <th>Nombre</th>
  </tr>
  <?php foreach($this->encuestas as $encuesta): ?>
    <?php
      $link = JRoute::_( "index.php?view=encuesta&id={$encuesta->id}" );
    ?>
  <tr>
     <td><a href="<?php echo $link; ?>"><?php echo $encuesta->id; ?></a></td>
     <td><?php echo $encuesta->nombre; ?></td>
  </tr>
  <?php endforeach; ?>
</table>

<?php else: ?>

<p>No hay encuestas disponibles abiertas.</p>

<?php endif; ?>
