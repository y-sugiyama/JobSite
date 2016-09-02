<?php
$this->assign('title', '求人詳細');
?>


<div class="jobs view">
<h2><?php echo __('求人詳細'); ?></h2>

  <table class="table table-bordered">  
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('タイトル'); ?></th>
        <th><?php echo __('カテゴリ'); ?></th>
        <th><?php echo __('求人内容'); ?></th>
    </tr>
    <tr>

        <td><?php echo h($job['Job']['id']); ?></td>
        <td><?php echo h($job['Job']['title']); ?></td>
        <td><?php echo h($job['Category']['name']); ?></td>
        <td><?php echo h($job['Job']['description']); ?></td>


    </tr>
  </table>

<p>
     <?php echo $this->Html->link('エントリーする', array('controller'=>'entry','action' => 'contact'),['class' => 'btn btn-primary']); ?>
</p>
</div>

