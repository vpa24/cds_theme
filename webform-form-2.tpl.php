<?php
$form['submitted']['input']['#attributes']['class'] = 'form-control';
$form['submitted']['input']['#attributes']['placeholder'] = 'Input';

// Feel free to break this up and move the pieces within the array.

?>
<div class="form-group col-8">
    <?php
    print drupal_render($form['submitted']);
    print drupal_render($form); ?>
</div>