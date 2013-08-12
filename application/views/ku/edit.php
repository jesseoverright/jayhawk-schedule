<h2>Edit <?php echo $game->opponent; ?> Game</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('schedule/game/'.$game->slug.'/edit/'); ?>
	<label for="opponent">Opponent</label>
	<input type="text" name="opponent" id="opponent" value="<?php echo $game->opponent; ?>"/><br />

	<label for="mascot">Mascot</label>
	<input type="text" name="mascot" id="mascot" value="<?php echo $game->mascot; ?>"/><br />

	<label for="location">Location</label>
	<input type="text" name="location" id="location" value="<?php echo $game->location; ?>" /><br />

	<label for="date">Date</label>
	<input type="text" name="date" id="date" value="<?php echo $game->date; ?>" /> <input type="text" name="time" id="time" value="<?php echo $game->time; ?>" /><br />

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
		<input type="text" name="score" id="score" value="<?php echo $game->score; ?>" /><br />
		
		<label for="opponent_score"><?php echo $game->opponent; ?> Final Score</label>
		<input type="text" name="opponent_score" id="opponent_score" value="<?php echo $game->opponent_score; ?>" /><br />
	<?php endif; ?>

	<input type="submit" name="submit" value="Update Game" /><input type="submit" name="delete" value="Delete Game" />

</form>