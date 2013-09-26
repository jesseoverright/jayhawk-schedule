<h2>Edit <?= $game->opponent; ?> Game</h2>

<?= validation_errors(); ?>

<?= form_open('schedule/game/'.$game->slug.'/edit/'); ?>
	<label for="opponent">Opponent</label>
	<input type="text" name="opponent" id="opponent" value="<?= $game->opponent; ?>"/><br />

	<label for="mascot">Mascot</label>
	<input type="text" name="mascot" id="mascot" value="<?= $game->mascot; ?>"/><br />

	<label for="location">Location</label>
	<input type="text" name="location" id="location" value="<?= $game->location; ?>" /><br />

	<label for="date">Date</label>
	<input type="text" name="date" id="date" value="<?= $game->date; ?>" /> <input type="text" name="time" id="time" value="<?= $game->time; ?>" /><br />

	<label for="television">Television</label>
	<input type="text" name="television" id="television" value="<?= $game->television; ?>" /><br />

	<label for="type">Game Type</label>
	<input type="radio" name="type" <?php if ($game->type == "Conference") echo "checked"; ?> value="Conference"> Conference<br />
	<input type="radio" name="type" <?php if ($game->type == "Non-Conference") echo "checked"; ?> value="Non-Conference"> Non-Conference<br />
	<input type="radio" name="type" <?php if ($game->type == "Preseason Tournament") echo "checked"; ?> value="Preseason Tournament"> Preseason Tournament<br />
	<input type="radio" name="type" <?php if ($game->type == "Conference Tournament") echo "checked"; ?> value="Conference Tournament"> Conference Tournament<br />
	<input type="radio" name="type" <?php if ($game->type == "NCAA Tournament") echo "checked"; ?> value="NCAA Tournament"> NCAA Tournament<br />
	<input type="radio" name="type" <?php if ($game->type == "Exhibition") echo "checked"; ?> value="Exhibition"> Exhibition<br />

	<hr />

	<?php if ($game->date < date("Y-m-d")): ?>
		<label for="score">Jayhawks Final Score</label>
		<input type="text" name="score" id="score" value="<?= $game->score; ?>" /><br />
		
		<label for="opponent_score"><?= $game->opponent; ?> Final Score</label>
		<input type="text" name="opponent_score" id="opponent_score" value="<?= $game->opponent_score; ?>" /><br />
	<?php endif; ?>

	<input type="submit" name="submit" value="Update Game" /><input type="submit" name="delete" value="Delete Game" />

</form>