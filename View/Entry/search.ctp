<?php
$this->assign('title', '求人検索');
?>

<h1>検索</h1>
 <?php echo $this->Form->create('Search', [
     'url' => ['controller'=>'entry', 'action' => 'projects']
     ]); ?>
 
 <div class="form-group <?php if ($this->Form->isFieldError('title')) {
                echo 'has-error';
            } ?>">
            <?php echo $this->Form->input('title',[
    'class' => 'form-control',
    'placeholder' => 'Title'
]);
?>

 </div>
 <button class="btn btn-lg btn-primary" type="submit">検索</button>

      <?php  echo $this->Form->end(); ?>
 

