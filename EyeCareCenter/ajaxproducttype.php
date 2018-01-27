<?php
$q=$_GET["q"];
include("includes/conn.php");
if($q == "Lenses")
{
?>
<select name="ptype2" id="ptype2">
<option value="">Select</option>
  <option value="Rimless Frame">Rimless Frame</option>
  <option value="Single Vision">Single Vision</option>
  <option value="D Bifocal">D Bifocal</option>
  <option value="Progressive">Progressive</option>
  <option value="Executive">Executive</option>
  <option value="Hi index">Hi index</option>
  <option value="Hi index HML">Hi index HML</option>
  <option value="SP2">SP2</option>
  <option value="SP2 Single Vision">SP2 Single Vision</option>
  <option value="SP2  Kryptok">SP2  Kryptok</option>
  <option value="SP2  Hi index">SP2  Hi index</option>
</select>
<?php
}
else if($q == "Glases")
{
	?>
<select name="ptype2" id="ptype2">
<option value="">Select</option>
  <option value="Rimless Frame">Rimless Frame</option>
  <option value="Plastic Frame">Plastic Frame</option>
  <option value="Metal Frame">Metal Frame</option>
</select>
<?php
}
else if($q == "Contact Lens")
{
	?>
<select name="ptype2" id="ptype2">
<option value="">Select</option>
  <option value="Regular">Regular</option>
  <option value="Disposable">Disposable</option>
  <option value="Toric">Toric</option>
  <option value="Cosmetic">Cosmetic</option>
</select>
<?php
}
?>