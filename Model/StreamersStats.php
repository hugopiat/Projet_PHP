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

?>