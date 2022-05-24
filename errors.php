<?php  if (count($errors) > 0) : ?>
  <div class="error" style=" color: red;
        position: absolute;
        top: 19%;
        left: 54%;
        transform: translate(-50%, -50%)">
  	<?php foreach ($errors as $error) : ?>
  	  <p><?php echo "Wrong credentials. Create a new account" ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>