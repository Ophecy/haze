<?php include 'header.php';
require('inc/db.php');
$sql = "SELECT content from alert";
$req = $pdo->query($sql);
$alerts = $req->fetchAll();
?>
<div class="w-100 d-flex flex-row justify-content-center">
  <div class="w-75 d-flex flex-row justify-content-around alert alert-light">
    <div id="graph" class="d-flex flex-column">
      <div>
        Graphiques :
      </div>
      <div>
        <div class="alert alert-primary"><img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=6&width=500&height=250&tz=Europe%2FParis" alt="graf1"></div>
        <div class="alert alert-primary"><img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=9&width=500&height=250&tz=Europe%2FParis" alt="graf2"></div>
        <div class="alert alert-primary"><img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=8&width=500&height=250&tz=Europe%2FParis" alt="graf3"></div>
        <div class="alert alert-primary"><img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=11&width=500&height=250&tz=Europe%2FParis" alt="graf4"></div>
        <div class="alert alert-primary"><img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=13&width=500&height=250&tz=Europe%2FParis" alt="graf5"></div>
      </div>
    </div>
    <div id="alerts flex-column-reverse">
      <div>Alertes</div>
      <div><?php
            foreach ($alerts as $key => $value) {
              $content = $value->content;
              $json = json_decode($content);
              echo '<div class="alert alert-danger">';
              echo $json->message;
              echo '</div>';
            }
            ?></div>
    </div>
  </div>
</div>



</body>

</html>