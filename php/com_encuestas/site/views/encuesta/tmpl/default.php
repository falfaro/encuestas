<?php
defined('_JEXEC') or die('Restricted access');

if(JDEBUG) {
  echo var_dump($this->poll) . "<br/>";
  echo "ID sesion: " . JFactory::getSession()->getId() . "<br/>";
}
?>

<h1>Encuesta <?php echo $this->poll->nombre; ?></h1>

<?php
$html = "";
$html = $html . '<form method="post">';
$html = $html . '<fieldset>';
$html = $html . '<legend><strong>' . $this->poll->descripcion . '</strong></legend>';

foreach($this->poll->elementos as $elemento)
{
  $html = $html . "<input type = 'radio'";
  $html = $html .       " name = 'voto' ";
  $html = $html .       " id = '$elemento->id'";
  $html = $html .       " value = '$elemento->id'";
  $html = $html . "/>" . $elemento->nombre . "<p/>";
}

if($this->poll->votos == 0) {
  $html = $html . "<input type='submit' value='Votar' />";
} else {
  $html = $html . "<input type='submit' value='Votar' disabled />";
}

$html = $html . '</fieldset>';
$html = $html . '</form>';
echo $html;

?>

La encuesta <?php echo $this->poll->nombre; ?> fue creada el dia <?php echo $this->poll->fecha_inicio; ?>
<?php if($this->poll->fecha_fin): ?>
 y su plazo de vigencia terminara el dia <?php echo $this->poll->fecha_fin; ?>
<?php endif; ?>
.</p>
