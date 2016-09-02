<?php
$this->assign('title', '求人検索');
?>


<div class="row" id="contact">
    <div class="col-md-6 col-md-offset-3"> 
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading" id="login"><h4><?php echo '求人検索画面'; ?></h4></div>
            <div class="panel-body">

                <?php
                echo $this->Form->create('Search', [
                    'url' => ['controller' => 'entry', 'action' => 'projects']
                ]);
                ?>

                <div class="form-group <?php
                         if ($this->Form->isFieldError('title')) {
                             echo 'has-error';
                         }
                         ?>">
                         <?php
                         echo $this->Form->input('title', [
                             'class' => 'form-control',
                             'placeholder' => '求人案件のタイトルから検索します'
                         ]);
                         ?>

                </div>
                <button class="btn btn-lg btn-primary" type="submit">検索</button>

<?php echo $this->Form->end(); ?>

            </div>
        </div>
    </div>


