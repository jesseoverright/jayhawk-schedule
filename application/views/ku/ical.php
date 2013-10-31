<?php 
    $events = "";
    foreach ($ku_games as $game) {
        if ($game->result) {
            $summary = ucfirst($game->result[0]).' '.$game->score.' - '.$game->opponent_score.' ';
        } else {
            $summary = '';
        }

        if ($game->location == "Allen Fieldhouse, Lawrence, KS") {
            $summary .= "{$game->opponent} {$game->mascot} at KU";
        }
        else {
            $summary .= "KU vs {$game->opponent} {$game->mascot}";
        }
        
        $events .= 'BEGIN:VEVENT
DTSTART;VALUE=DATE-TIME;TZID=US/Central:'.date('Ymd',strtotime($game->date)).'T'.date('Hi00',strtotime($game->time)).'
DTEND;VALUE=DATE-TIME;TZID=US/Central:'.date('Ymd',strtotime($game->date)).'T'.date('Hi00',strtotime('+2 hours',strtotime($game->time))).'
DTSTAMP:'.gmdate('Ymd').'T'.gmdate('Hi00').'Z'.'
CREATED:'.gmdate('Ymd').'T'.gmdate('Hi00').'Z'.'
LAST-MODIFIED:'.gmdate('Ymd').'T'.gmdate('Hi00').'Z'.'
UID:'.$game->slug.'
SUMMARY:'.$summary.'
DESCRIPTION:Broadcast on '.$game->television.'
X-ALT-DESC;FMTTYPE=text/html:<p>Broadcast on '.$game->television.'</p>
LOCATION:'.$game->location.'
URL:http://jayhawkschedule.co/schedule/game/'.$game->slug.'
CLASS:PUBLIC
STATUS:CONFIRMED
END:VEVENT
';
    }

    echo $events;