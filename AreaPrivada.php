<?php
   session_start();
   if(!isset($_SESSION['id_usuario']))
   {
       header("location: index.php");
       exit;
   }



?>


SEJA BEMMM VINDA IDETEEEE!!

<a href="sair.php">Sair</a>