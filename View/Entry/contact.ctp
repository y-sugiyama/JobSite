<?php
$this->assign('title', 'エントリー');
?>


<div class="row" id="contact">
    <div class="col-md-6 col-md-offset-3"> 
        <?php echo $this->Form->create('Entry'); ?>
        <div class="form-group <?php if ($this->Form->isFieldError('name')) {
            echo 'has-error';
        } ?>">
            <?php
            echo $this->Form->input('name', [
                'type' => 'text',
                'label' => 'お名前',
                'maxlength' => 255,
                'class' => 'form-control',
                'placeholder' => '山田 太郎'
            ]);
            ?>
        </div>

        <div class="form-group <?php if ($this->Form->isFieldError('email')) {
                echo 'has-error';
            } ?>">
            <?php
            echo $this->Form->input('email', [
                'type' => 'email',
                'label' => 'メールアドレス',
                'maxlength' => 255,
                'class' => 'form-control',
                'placeholder' => 'aaa@example.com'
            ]);
            ?>
        </div>
        
        <div class="form-group <?php if ($this->Form->isFieldError('age')) {
                echo 'has-error';
            } ?>">
            <?php
            echo $this->Form->input('age', [
                'type' => 'text',
                'label' => '年齢',
                'maxlength' => 255,
                'class' => 'form-control',
                'placeholder' => '31'
            ]);
            ?>
        </div>
        
        <div class="form-group <?php if ($this->Form->isFieldError('tel')) {
                echo 'has-error';
            } ?>">
            <?php
            echo $this->Form->input('tel', [
                'type' => 'text',
                'label' => '電話番号',
                'maxlength' => 255,
                'class' => 'form-control',
                'placeholder' => '080-0000-0000'
            ]);
            ?>
        </div>
        
        <div class="form-group <?php if ($this->Form->isFieldError('address')) {
                echo 'has-error';
            } ?>">
            <?php
            echo $this->Form->input('address', [
                'type' => 'text',
                'label' => '住所',
                'maxlength' => 255,
                'class' => 'form-control',
                'placeholder' => '東京都品川区蒲田5'
            ]);
            ?>
        </div>

        <div class="form-group <?php if ($this->Form->isFieldError('subject')) {
                echo 'has-error';
            } ?>">
            <?php
            echo $this->Form->input('subject', [
                'type' => 'text',
                'label' => '題名',
                'maxlength' => 255,
                'class' => 'form-control',
                'placeholder' => '題名'
            ]);
            ?>
        </div>

        <div class="form-group <?php if ($this->Form->isFieldError('body')) {
                echo 'has-error';
            } ?>">
            <?php echo $this->Form->input('body', [
                'type' => 'textarea',
                'label' => '備考',
                'maxlength' => 3000,
                'class' => 'form-control',
                'placeholder' => '備考(ご質問など)'
            ]);?>
        </div>
        <button class="btn btn-lg btn-primary" type="submit">送信</button>

        <?php echo $this->Form->end(); ?>
    </div>
</div>




<?php
/*
$options = array(
    'label' => '送信',
    'div' => array(
        'class' => 'btn btn-primary',
        
    )
);

echo $this->Form->end($options,[
    'div' => 'false'
]);
*/