<h1>Login</h1>
<?= validation_errors('<div class="errors">','</div>') ?>

<?php echo form_open('login'); ?>
<p>
    <?php
        echo form_label('User Name', 'username');
        echo form_input('username', set_value('username'), 'id="username"');
    ?>
</p>
<p>
    <?php
        echo form_label('Password', 'password');
        echo form_password('password', '','id="password"');
    ?>
</p>

    <?php echo form_submit('submit','Login'); ?>


<?php echo form_close(); ?>