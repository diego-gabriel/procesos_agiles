<option value = "<?=$area->getId()?>" <?= isset($materia) && 
$materia->getArea()->getId() == $area->getId() ? "selected" : "" ?> >
 <?=$area->getNombre()?> </option>