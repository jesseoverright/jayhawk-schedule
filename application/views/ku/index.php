<div class="edit"><p><a href="/schedule/game/create">Add game</a></p></div>
<?php foreach ($ku_games as $game) : ?>
	<div class="game">
		<?php if ($game->result): ?>
			<h2 class="final-score <?php echo $game->result; ?>">
				<?php echo $game->score; ?> - <?php echo $game->opponent_score; ?>
			</h2>
		<?php endif; ?>
		<h2><a href="/schedule/game/<?php echo $game->slug; ?>"><?php echo $game->opponent.' '.$game->mascot; ?></a>	</h2>
		<p><span class="game-type"><?php echo $game->type; ?></span><?php echo $game->time; ?> <?php echo $game->formatted_date;?></p>
	</div>
<?php endforeach ?>