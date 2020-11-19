<?php
include 'header.php';
require('inc/db.php');
$sql = "SELECT content from alert";
$req = $pdo->query($sql);
$alerts = $req->fetchAll();
header("Access-Control-Allow-Origin: *");

?>
<div class="w-100 d-flex flex-row justify-content-center">
  <div class="w-75 d-flex flex-row justify-content-around alert alert-light" style="position: initial;">
    <div id="graph" class="d-flex flex-column mr-2">
      <div>
        Graphiques :
      </div>
      <div>
        <div class="alert alert-primary" style="position: initial;">
          <img src="images/workshop1.png" alt="graph1">
        </div>
        <div class="alert alert-primary" style="position: initial;">
          <img src="images/workshop2.png" alt="graph2">
        </div>
        <div class="alert alert-primary" style="position: initial;">
          <img src="images/workshop3.png" alt="graph3">
        </div>
        <div class="alert alert-primary" style="position: initial;">
          <img src="images/workshop4.png" alt="graph4">
        </div>
        <div class="alert alert-primary" style="position: initial;">
          <img src="images/workshop5.png" alt="graph5">
        </div>
      </div>
    </div>
    <div id="alerts flex-column-reverse ml-2" style="position: initial;">
      <div>Alertes</div>
      <div>
        <?php
            foreach ($alerts as $key => $value) {
              $content = $value->content;
              $json = json_decode($content);
              echo '<div class="alert alert-danger" style="position: initial;">';
              echo $json->message;
              echo '</div>';
            }
            ?>
      </div>
    </div>
  </div>
</div>



</body>

</html>