
<div class="jobs add form">

    <div class="container">

        <!-- content -->
        <div class="row" style="padding:5px 0 0 0">
            <!-- left -->
            <div class="col-md-3">   

                <?php echo $this->element('menu_admin'); ?>

            </div>

            <!-- center -->
            <div class="col-md-9" style="background-color:white">

                <h2 class="form-news-heading"><?php echo '求人追加画面'; ?></h2>


                <?php echo $this->Form->create('Job', ['novalidate' => 'novalidate']) ?>

                <div class="form-group <?php
                if ($this->Form->isFieldError('title')) {
                    echo 'has-error';
                }
                ?>">
                         <?php
                         echo $this->Form->input('title', [
                             'class' => 'form-control',
                             'placeholder' => 'タイトル'
                         ]);
                         ?>

                </div>

                <div class="form-group <?php
                if ($this->Form->isFieldError('companyname')) {
                    echo 'has-error';
                }
                ?>">
                         <?php
                         echo $this->Form->input('companyname', [
                             'class' => 'form-control',
                             'placeholder' => '会社名'
                         ]);
                         ?>

                </div>

                <div class="form-group <?php
                if ($this->Form->isFieldError('description')) {
                    echo 'has-error';
                }
                ?>">
                         <?php
                         echo $this->Form->input('description', [
                             'class' => 'form-control',
                             'placeholder' => '仕事内容'
                         ]);
                         ?></div>

                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group <?php
                        if ($this->Form->isFieldError('salary')) {
                            echo 'has-error';
                        }
                        ?>">
                                 <?php
                                 echo $this->Form->input('salary', [
                                     'class' => 'form-control',
                                     'placeholder' => '給与'
                                 ]);
                                 ?></div></div>
                    <div class="col-md-6" id="salary">万円</div>
                </div>

                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group <?php
                        if ($this->Form->isFieldError('area')) {
                            echo 'has-error';
                        }
                        ?>">
                                 <?php
                                 echo $this->Form->input('field', [
                                     'label' => 'Area',
                                     'class' => 'form-control',
                                     'placeholder' => 'エリア',
                                     'options' => [
                                         '神奈川県',
                                         '東京都'
                                     ]
                                 ]);
                                 ?></div></div>

                </div>
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="form-group <?php
                        if ($this->Form->isFieldError('categori_id')) {
                            echo 'has-error';
                        }
                        ?>">
                                 <?php
                                 echo $this->Form->input('categori_id', [
                                     'label' => 'Category',
                                     'class' => 'form-control',
                                     'placeholder' => 'カテゴリー',
                                     'type' =>'select',
                                     'options' => $categories
                                 ]);
                                 ?></div></div>

                </div>





                <button class="btn btn-lg btn-primary" type="submit"><?php echo '新規追加'; ?></button>
                <?php echo $this->Form->end(); ?> 



            </div>
        </div>
    </div>
</div>
