<h2>Create a KU Game</h2>

<?= validation_errors('<div class="errors">','</div>') ?>

<?= form_open('schedule/game/create/') ?>

<?= form_label('Opponent','opponent') ?>
<?= form_input('opponent', set_value('opponent'), 'id="opponent"') ?>
<br />

<?= form_label('Mascot','mascot') ?>
<?= form_input('mascot', set_value('mascot'), 'id="mascot"') ?>
<br />

<?= form_label('Location','location') ?>
<?= form_input('location', set_value('location'), 'id="location"') ?>
<br />

<label for="date">Date</label>
<input type="text" name="date" id="date" /> <input type="text" name="time" id="time" value="8:00 PM" /><br />

<?= form_label('Television','television') ?>
<?= form_input('television', set_value('television'), 'id="television"') ?>
<br />

<label for="type">Game Type</label>
<input type="radio" name="type" value="Conference"> Conference<br />
<input type="radio" name="type" value="Non-Conference"> Non-Conference<br />
<input type="radio" name="type" value="Preseason Tournament"> Preseason Tournament<br />
<input type="radio" name="type" value="Conference Tournament"> Conference Tournament<br />
<input type="radio" name="type" value="NCAA Tournament"> NCAA Tournament<br />
<input type="radio" name="type" value="Exhibition"> Exhibition<br />

<?= form_submit('submit','Create KU Game') ?>

</form>