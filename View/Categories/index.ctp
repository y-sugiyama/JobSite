

<div class="categories index">

    <div class="container">

        <!-- content -->
        <div class="row" style="padding:5px 0 0 0">
            <!-- left -->
            <div class="col-md-3">   

                <?php echo $this->element('menu_admin'); ?>

            </div>

            <!-- center -->
            <div class="col-md-9" style="background-color:white">
                <h2><?php echo 'カテゴリ一覧'; ?></h2>


                <p><?php echo $this->Html->link('新規追加', array('controller' => 'categories', 'action' => 'add'),['class' => 'btn btn-default']); ?></p>


                <?php echo $this->fetch('content'); ?>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>カテゴリの名前</th>
                        <th>作成日</th>
                        <th>アクション</th>
                    </tr>
                    <?php foreach ($categories as $category): ?>

                        <tr>

                            <td><?php echo h($category['Category']['id']); ?></td>
                            <td><?php echo h($category['Category']['name']); ?>&nbsp;</td>
                            <td><?php echo h($category['Category']['created']); ?>&nbsp;</td>
                            <td class="actions">

                                <?php echo $this->Html->link('編集', array('action' => 'edit', $category['Category']['id']),['class' => 'btn btn-default']); ?>
                               <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $$category['Category']['id']),['class' => 'btn btn-danger']); ?>

                            </td>
                        </tr>
<?php endforeach; ?>

                </table>
            

            </div>

        </div>

    </div>
    <!-- ビューで表示したいものはここに配置します。 -->

</div>




