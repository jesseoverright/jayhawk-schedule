<div class="edit"><p><a href="/schedule/game/create">Add game</a></p></div>
<?php foreach ($ku_games as $game) : ?>
	<div class="game">
		<?php if ($game->result): ?>
			<h2 class="final-score <?= $game->result; ?>">
				<?= $game->score; ?> - <?= $game->opponent_score; ?>
			</h2>
		<?php endif; ?>
		<h2><a href="/schedule/game/<?= $game->slug; ?>"><?= $game->opponent.' '.$game->mascot; ?></a>	</h2>
		<p><span class="game-type"><?= $game->type; ?></span><?= $game->time; ?> <?= $game->formatted_date;?><?php if ($game->television != '') echo " on {$game->television}"; ?></p>
	</div>
<?php endforeach ?>