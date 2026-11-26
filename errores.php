<?php 
if (count($errores) > 0){
  echo "<div class='error'>";
  foreach ($errores as $error){ 
    echo "<p>$error</p>";
  }
  echo "</div>";
}
?>