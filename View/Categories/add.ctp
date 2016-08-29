
<div class="categories form">

    <div class="container">

        <!-- content -->
        <div class="row" style="padding:5px 0 0 0">
            <!-- left -->
            <div class="col-md-3">   

                <?php echo $this->element('menu_admin'); ?>

            </div>

            <!-- center -->
            <div class="col-md-9" style="background-color:white">

                <h2 class="form-news-heading"><?php echo 'カテゴリ追加画面'; ?></h2>


                <?php echo $this->Form->create('Category', ['novalidate' => 'novalidate']) ?>

                <div class="form-group <?php
                if ($this->Form->isFieldError('category')) {
                    echo 'has-error';
                }
                ?>">
                         <?php
                         echo $this->Form->input('name', [
                             'class' => 'form-control',
                      
                             'placeholder' => 'カテゴリの名前'
                         ]);
                         ?>

                </div>

               




                <button class="btn btn-lg btn-primary btn-block" type="submit"><?php echo '新規追加'; ?></button>
<?php echo $this->Form->end(); ?> 


            </div>
        </div>
    </div>
</div>
