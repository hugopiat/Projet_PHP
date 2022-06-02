<!-- ~/php/tp1/view/cities.php -->
<!DOCTYPE HTML>
<html>

<?php 
if(isset($_POST['submit']))
{
    //echo "Vous avez selectionner ".$_POST['Tri'];
    $Select_tri = $_POST['Tri'];
    //$Select_cacher = $_POST['tab_cacher'];
    $Streamers = Tri_General($dbh, $Select_tri);          
}

$classment_anto = Classement2($Classement, $Streamers, 'ANTOINE DANIEL');
//var_dump($classment_anto);
$classment_zera = Classement2($Classement, $Streamers, 'ZERATOR');
//var_dump($classment_zera);
$classment_domi = Classement2($Classement, $Streamers, 'DOMINGO');
//var_dump($classment_domi);
$classment_pon = Classement2($Classement, $Streamers, 'PONCE');
//var_dump($classment_pon);
$classment_mynt = Classement2($Classement, $Streamers, 'MYNTHOS');
//var_dump($classment_mynt);
$classment_kame = Classement2($Classement, $Streamers, 'KAMETO');
//var_dump($classment_kame);

?>

<head>
    <meta http-equiv="content-type" content="text/html;
        charset=utf-8" />
    <link rel="stylesheet" href="style.css" />
    <title>Twitch Stat</title>
    <link rel="icon" type="image/png" sizes="32x32" href="https://static.twitchcdn.net/assets/favicon-32-e29e246c157142c94346.png" >
</head>

<body>
    <div class="haut-de-page">
        <div class="bloc-violet">
            <h1>Twitch Stat</h1>            
            <div class="tri">
                <form action="" method="POST">
                    <select name="Tri" id="Tri-select">
                        <option value="1">Id</option>
                        <option value="2">name</option>
                        <option value="4">Min streamed</option>
                        <option value="5">Rank</option>
                        <option value="6">AVG_viewers</option>
                        <option value="7">MAX_viewers</option>
                        <option value="8">Hours_stream</option>
                        <option value="9">Followers</option>
                        <option value="10">Views</option>
                        <option value="11">Followers_total</option>
                        <option value="12">Views_total</option>
                    </select>
                    <input type="submit" name="submit" value="Valider">
                </form>
            </div>
        </div>
    </div>
    <form action="" method="POST">
    <div class="bloc-streamer-1">       
        <div class="bloc-ad" id = "0">
            <imgAD title="photo Antoine Daniel">
            <a href= "/StreamersStats.php?id=1">
            <img alt="Antoine Daniel" src="https://static.hitek.fr/img/actualite/2016/09/20/fb_maxresdefault-93.jpg" width="100%" height="100%"/></a>
            <figcaption><input type = "checkbox" name="tab_cacher" onclick="IsChecked(this, '0')"> Antoine Daniel N°<?= $classment_anto ?></figcaption>
        </div>
        <div class="bloc-zera" id = "1" >
            <imgAD title="photo Zerator">
            <a href= "/StreamersStats.php?id=2">
            <img alt="Zerator" src="https://intrld.com/wp-content/uploads/2021/10/zerator-twitch.png" width="100%" height="89%"/></a>
            <figcaption><input type = "checkbox" name="tab_cacher" onclick="IsChecked(this, '1')"> Zerator N°<?= $classment_zera  ?></figcaption>
        </div>        
        <div class="bloc-pa" id = "2">
            <imgAD title="photo Domingo">
            <a href= "/StreamersStats.php?id=3">
            <img alt="Domingo" src="https://medias.lequipe.fr/img-photo-jpg/pierre-alexis-domingo-bizot-est-l-un-des-streamers-qui-amenent-le-sport-sur-twitch-et-au-zevent/1500000001562706/1:151,1724:1300-640-427-75/4667f.jpg" width="100%" height="81%"/></a>
            <figcaption><input type = "checkbox" name="tab_cacher" onclick="IsChecked(this, '2')"> Domingo N°<?= $classment_domi  ?></figcaption>
        </div>
    </div>
    
    <div class="bloc-streamer-2">
        <div class="bloc-ponce" id = "3">
            <imgAD title="photo Ponce">
            <a href= "/StreamersStats.php?id=4">
            <img alt="Ponce" src="https://pokaa.fr/wp-content/uploads/2020/11/tete-ailleurs-ponce.jpg" width="100%" height="81%"/></a>
            <figcaption><input type = "checkbox" onclick="IsChecked(this, '3')"> Ponce N°<?= $classment_pon  ?></figcaption>
        </div>        
        <div class="bloc-myn" id = "4" >
            <imgAD title="photo Mynthos">
            <a href= "/StreamersStats.php?id=5">
            <img alt="Mynthos" src="https://clips-media-assets2.twitch.tv/AT-cm%7CxZmKdUsB12m0SaRfj-wIuA-preview-480x272.jpg" width="100%" height="93.2%"/></a>
            <figcaption><input type = "checkbox" onclick="IsChecked(this, '4')"> Mynthos N°<?= $classment_mynt  ?></figcaption>
        </div>
        <div class="bloc-kamel" id = "5">
            <imgAD title="photo Kameto">
            <a href= "/StreamersStats.php?id=6">
            <img alt="Kameto" src="https://pbs.twimg.com/media/FDDJp2dXoAM_vcp?format=jpg&name=4096x4096" width="100%" height="81%"/></a>
            <figcaption><input type = "checkbox" onclick="IsChecked(this, '5')"> Kameto N°<?= $classment_kame  ?></figcaption>
        </div>
    </div>
    </form>
</body>

<script type="text/javascript">
    
    function IsChecked(input, div_stats,value){
        if(input.checked){
            document.getElementById(div_stats).style.opacity = 0.2;
        }
        else {
            document.getElementById(div_stats).style.opacity = 1;
            
        }
    }
</script>

</html>