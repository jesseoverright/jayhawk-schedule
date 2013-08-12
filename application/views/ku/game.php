<div class="edit"><p><a href="/schedule/game/<?php echo $game->slug; ?>/edit">Edit game</a></p></div>
<div id="single-game">
	<h2>Kansas Jayhawks vs <?php echo $game->opponent.' '.$game->mascot; ?></h2>
	<?php if ($game->result): ?>
		<h2 class="final-score <?php echo $game->result; ?>">
			<?php echo $game->score; ?> - <?php echo $game->opponent_score; ?>
		</h2>
	<?php endif; ?>
	<h3 class="date"><?php echo $game->time; ?> <?php echo $game->formatted_date; ?></h3>
	<h3 class="location"><?php echo $game->location; ?></h3>
</div>