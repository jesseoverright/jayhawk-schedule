<div class="edit"><p><a href="/schedule/game/<?= $game->slug; ?>/edit">Edit game</a></p></div>
<div id="single-game">
	<h2>Kansas Jayhawks vs <?= $game->opponent.' '.$game->mascot; ?></h2>
	<?php if ($game->result): ?>
		<h2 class="final-score <?= $game->result; ?>">
			<?= $game->score; ?> - <?= $game->opponent_score; ?>
		</h2>
	<?php endif; ?>
	<h3 class="date"><?= $game->time; ?> <?= $game->formatted_date; ?><?php if ($game->television != '') echo " on {$game->television}"; ?></h3>
	<h3 class="location"><?= $game->location; ?></h3>
</div>