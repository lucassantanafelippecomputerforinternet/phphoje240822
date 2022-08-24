<?php
 include_once('templates/header.php'); ?>
 <div class="container" id="view-contact-container">
     <?php include_once("templates/backbtn.html") ?>
     <h1 id="main-title"><? $taerefas["nome"] ?></h1>
     <p class="bold">Tarefa:</p>
     <p><?= $tarefas["tarefa"] ?></p>
     <p class="bold">Observações:</p>
     <p><?= $tarefas["obs"] ?></p>
 </div>

 <?php include_once('templates/footer.php'); ?>