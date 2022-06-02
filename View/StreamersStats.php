<!-- ~/php/tp1/view/cities.php -->

<!DOCTYPE HTML>
<html>

<?php 
$Select_tri = 'views';
if(isset($_POST['submit']))
{
    //echo "Vous avez selectionner ".$_POST['Tri'];
    $Select_tri = $_POST['Tri'];
    //$Select_cacher = $_POST['tab_cacher'];        
}

$Select_tri_date = '0';
if(isset($_POST['submit2']))
{
    //echo "Vous avez selectionner ".$_POST['Tri_par_date'];
    $Select_tri_date = $_POST['Tri_par_date'];
    //$Select_cacher = $_POST['tab_cacher'];        
}
?>

<head>
    <meta http-equiv="content-type" content="text/html;
        charset=utf-8" />
    <link rel="stylesheet" href="stylebis.css" />
    <title>Twitch Stat</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://static.twitchcdn.net/assets/favicon-32-e29e246c157142c94346.png" >
</head>

<body>

    <article class="information">
            <div class="name_checkbox">
                <p class="blaze"> <?= $Streamer["name"] ?> </a> </p>
                <div class="tri">
                <form action="" method="POST">
                    <select name="Tri_par_date" id="Tri-select">
                        <option value="0">Date 1</option>
                        <option value="1">Date 2</option>
                        <option value="2">Date 3</option>
                    </select>
                    <input type="submit" name="submit2" value="Valider">
                </form>
            </div>
            </div>
            <?php
                $sql_streamer_stats = "SELECT * FROM `streamers-stats` WHERE streamer = " . $Streamer['id'] . " ORDER BY date DESC;";
                $requete_streamer_stats = $dbh->query($sql_streamer_stats);
                $streamer_stats = $requete_streamer_stats->fetchAll();
            ?>
            <div class="data" id="<?= $Streamer['name'] ?>">
                <div><p> - Le rank : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["rank"];} else {echo null; } ?> °</p></div>
                <div><p> - La date : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["date"];} else {echo null; } ?></p></div>
                <div><p> - Les minutes de streaming : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["minutes_streamed"];} else {echo null; } ?> min</p></div>
                <div><p> - La moyenne de viewers : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["avg_viewers"];} else {echo null; } ?> en moyenne</p></div>
                <div><p> - Le maximum de viewers : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["max_viewers"];} else {echo null; } ?> max</p></div>
                <div><p> - Le nombre d'heures regardées : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["hours_watched"];} else {echo null; } ?> h</p></div>
                <div><p> - Le nombre de followers : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["followers"];} else {echo null; } ?> followers</p></div>
                <div><p> - Le nombre de viewers : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["views"];} else {echo null; } ?> viewers</p></div>
                <div><p> - Le nombre de followers totale : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["followers_total"];} else {echo null; } ?> followers total</p></div>
                <div><p> - Le nombre de viewers totale : <?php if( array_key_exists($Select_tri_date, $streamer_stats)) {echo $streamer_stats[$Select_tri_date]["views_total"];} else {echo null; } ?> viewers total</p></div>
            </div>

            <div class="tri">
                <form action="" method="POST">
                    <select name="Tri" id="Tri-select">
                        <option value="minutes_streamed">Min streamed</option>
                        <option value="rank">Rank</option>
                        <option value="avg_viewers">AVG_viewers</option>
                        <option value="max_viewers">MAX_viewers</option>
                        <option value="hours_watched">Hours_stream</option>
                        <option value="followers">Followers</option>
                        <option value="views">Views</option>
                        <option value="followers_total">Followers_total</option>
                        <option value="views_total">Views_total</option>
                    </select>
                    <input type="submit" name="submit" value="Valider">
                </form>
            </div>
            

    </article>
    <div class="graph">
      <canvas id="Graphique"></canvas>
    </div>
    <div><a class="retour" href="/Streamers.php"> Page d'acceuil <a></div>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const labels = [
    "<?php if( array_key_exists('2', $streamer_stats)) { echo $streamer_stats[2]['date'];} else {echo null; } ?>",
    "<?php if( array_key_exists('1', $streamer_stats)) { echo $streamer_stats[1]['date'];} else {echo null; } ?>",
    "<?php if( array_key_exists('0', $streamer_stats)) { echo $streamer_stats[0]['date'];} else {echo null; } ?>"
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Graphique',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: ["<?php if( array_key_exists('2', $streamer_stats)) { echo $streamer_stats[2][$Select_tri];} else {echo null; } ?>",
            "<?php if( array_key_exists('1', $streamer_stats )) { echo $streamer_stats[1][$Select_tri];} else {echo null; } ?>",
            "<?php if( array_key_exists('0', $streamer_stats )) { echo $streamer_stats[0][$Select_tri];} else {echo null; } ?>"
            ], 
        }]
  };

  const config = {type: 'line', data: data, options: {}};
</script>

<script>
  const myChart = new Chart(
    document.getElementById('Graphique'),
    config
  );
</script>

</html>