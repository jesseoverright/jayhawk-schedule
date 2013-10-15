<?php 
    $events = "";
    foreach ($ku_games as $game) { 

        if ($game->location == "Allen Fieldhouse, Lawrence, KS") {
            $summary = "{$game->opponent} {$game->mascot} at Kansas Jayhawks";
        }
        else {
            $summary = "Kansas Jayhawks vs {$game->opponent} {$game->mascot}";
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
URL:http://54.200.23.89/schedule/game/'.$game->slug.'
CLASS:PUBLIC
STATUS:CONFIRMED
END:VEVENT
';
    }

    echo $events;