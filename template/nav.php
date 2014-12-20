<?php
//echo  $_SESSION['Ncategoria'];
if ($_SESSION['Ncategoria'] =='Administrator') {
   include 'template/navadmin.php'; 
}
if ($_SESSION['Ncategoria'] =='Directivo') {
   include 'template/navdirectivo.php'; 
}
if ($_SESSION['Ncategoria'] =='Afiliado') {
   include 'template/navafiliado.php'; 
}



?>