<?php
// ~/php/tp1/model/Streamers.php

function GetStreamer($dbh, $name)
{
    $sql = 'SELECT streamers.id, streamers.name, `streamers-stats`.`date`, `streamers-stats`.`minutes_streamed`,
    `streamers-stats`.`rank`, `streamers-stats`.`avg_viewers`, `streamers-stats`.`max_viewers`, `streamers-stats`.`hours_watched`,
    `streamers-stats`.`followers`, `streamers-stats`.`views`, `streamers-stats`.`followers_total`, `streamers-stats`.`views_total`
    FROM streamers
    INNER JOIN `streamers-stats` ON `streamers-stats`.streamer = streamers.id
    WHERE streamers.name LIKE "%'. $name .'%";';
    $stream = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stream->execute();
    $test = $stream->fetchAll();
    return $test;
}

function GetAllStreamer($dbh)
{
    $sql = 'SELECT streamers.id, streamers.name, `streamers-stats`.`date`, `streamers-stats`.`minutes_streamed`,
    `streamers-stats`.`rank`, `streamers-stats`.`avg_viewers`, `streamers-stats`.`max_viewers`, `streamers-stats`.`hours_watched`,
    `streamers-stats`.`followers`, `streamers-stats`.`views`, `streamers-stats`.`followers_total`, `streamers-stats`.`views_total`
    FROM streamers
    INNER JOIN `streamers-stats` ON `streamers-stats`.streamer = streamers.id
    GROUP BY 1;';
    $stream = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stream->execute();
    $test = $stream->fetchAll();
    return $test;
}

function Tri_General($dbh, $tri)
{
    $sql = 'SELECT streamers.id, streamers.name, `streamers-stats`.`date`, `streamers-stats`.`minutes_streamed`,
    `streamers-stats`.`rank`, `streamers-stats`.`avg_viewers`, `streamers-stats`.`max_viewers`, `streamers-stats`.`hours_watched`,
    `streamers-stats`.`followers`, `streamers-stats`.`views`, `streamers-stats`.`followers_total`, `streamers-stats`.`views_total`
    FROM streamers
    INNER JOIN `streamers-stats` ON `streamers-stats`.streamer = streamers.id
    GROUP BY 1
    ORDER BY ' . $tri .';';
    $stream = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
    $stream->execute();
    $test = $stream->fetchAll();
    return $test;
}

function Classement($Classement, $Streamers){
    for($i = 0; $i < 6; $i++){
        $Classement[$i][0] = $Streamers[$i][1];
    }
    return $Classement;
}

function Place($Classement, $name, $Streamers){
    $it = 0;
    for(; $it < 6;){
        if($Streamers[$it][1] === $name)
        {
            $valeur = $Classement[$it]["classement"];
            return $valeur;
        }
        else{
            $it++;
        }
    }
    return null;
}

function Classement2($Classement,$Streamers, $name ){
    $Classement_bis = Classement($Classement, $Streamers);
    $valeur = Place($Classement_bis, $name, $Streamers);
    return $valeur;
};


$Streamers = GetAllStreamer($dbh);
$Streamers_const = GetAllStreamer($dbh);
$Classement = array(
    ['name' => 'ANTOINE DANIEL', 'classement' => 1, 'cacher' => 'no'],
    ['name' => 'ZERATOR', 'classement' => 2, 'cacher' => 'no'],
    ['name' => 'DOMINGO', 'classement' => 3, 'cacher' => 'no'],
    ['name' => 'PONCE', 'classement' => 4, 'cacher' => 'no'],
    ['name' => 'MYNTHOS', 'classement' => 5, 'cacher' => 'no'],
    ['name' => 'KAMETO', 'classement' => 6, 'cacher' => 'no']);

