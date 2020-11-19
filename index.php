<?php include 'header.php';
include_once('inc/db.php');
$sql = "SELECT content from alert";
$req = $pdo->query($sql);
$alerts = $req->fetchAll();
?>
<div class="w-100 d-flex flex-row justify-content-center">
  <div class="w-75 d-flex flex-row justify-content-around">
    <div id="graph" class="d-flex flex-column">
      <div>
        Graphiques :
      </div>
      <div>
        <img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=6&width=500&height=250&tz=Europe%2FParis" alt="graf1">
        <img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=9&width=500&height=250&tz=Europe%2FParis" alt="graf2">
        <img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=8&width=500&height=250&tz=Europe%2FParis" alt="graf3">
        <img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=11&width=500&height=250&tz=Europe%2FParis" alt="graf4">
        <img src="https://jeremymanso1.grafana.net/render/d-solo/0lhkzhTMz/workshop?from=1605740024636&orgId=1&to=1605914650056&panelId=13&width=500&height=250&tz=Europe%2FParis" alt="graf5">
      </div>
    </div>
    <div id="alerts flex-column-reverse">
      <div>Alertes</div>
      <div><?php
            foreach ($alert as $key => $value) {
              $jsonAlert = json_decode($value);
              echo $jsonAlert->message;
            }
            ?></div>
    </div>
  </div>
</div>



</body>

</html>