<h2>Create a KU Game</h2>

<?php echo validation_errors(); ?>

<?php echo form_open('schedule/game/create/'); ?>
	
	<label for="opponent">Opponent</label>
	<input type="text" name="opponent" id="opponent" /><br />

	<label for="mascot">Mascot</label>
	<input type="text" name="mascot" id="mascot" /><br />

	<label for="location">Location</label>
	<input type="text" name="location" id="location" /><br />

	<label for="date">Date</label>
	<input type="text" name="date" id="date" /> <input type="text" name="time" id="time" value="8:00 PM" /><br />

	<label for="type">Game Type</label>
	<input type="radio" name="type" value="Conference"> Conference<br />
	<input type="radio" name="type" value="Non-Conference"> Non-Conference<br />
	<input type="radio" name="type" value="Preseason Tournament"> Preseason Tournament<br />
	<input type="radio" name="type" value="Conference Tournament"> Conference Tournament<br />
	<input type="radio" name="type" value="NCAA Tournament"> NCAA Tournament<br />
	<input type="radio" name="type" value="Exhibition"> Exhibition<br />

	<input type="submit" name="submit" value="Create KU Game" />

</form>