

<div class="jobs index">

    <div class="container" id="job">

        <!-- content -->
        <div class="row" style="padding:5px 0 0 0">
            <!-- left -->
            <div class="col-md-3">   

                <?php echo $this->element('menu_admin'); ?>

            </div>

            <!-- center -->
            <div class="col-md-9" id="job" style="background-color:white">
                <h3><?php echo '求人一覧'; ?></h3>


                <p><?php echo $this->Html->link('新規追加', array('controller' => 'jobs', 'action' => 'add'), ['class' => 'btn btn-default']); ?></p>


                <?php echo $this->fetch('content'); ?>
                <table class="table table-striped">
                    <tr>
                        <th>タイトル</th>


                        <th>エリア</th>
                        <th>会社名</th>
                        <th>カテゴリ</th>
                        <th>作成日</th>
                        <th>アクション</th>
                    </tr>
                    <?php foreach ($jobs as $job): ?>

                        <tr>

                            <td><?php echo $this->Html->link(h($job['Job']['title']), ['action' => 'view', $job['Job']['id']]); ?></td>
    <!--                            <td><?php
                            echo $this->Text->truncate(h($job['Job']['description']), 10, [
                                'ellipsis' => '...',
                                'exact' => true,
                                'html' => true
                            ]);
                            ?>&nbsp;</td>
                            <td><?php echo h($job['Job']['salary']); ?>&nbsp;</td>-->
                            <td><?php echo h($job['Area']['name']); ?>&nbsp;</td>
                            <td><?php echo h($job['Job']['companyname']); ?>&nbsp;</td>
                            <td><?php echo h($job['Category']['name']); ?>&nbsp;</td>
                            <td><?php echo h($job['Job']['created']); ?>&nbsp;</td>
                            <td class="actions">

    <?php echo $this->Html->link('編集', array('action' => 'edit', $job['Job']['id']), ['class' => 'btn btn-default']); ?>
                                <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $job['Job']['id']), ['class' => 'btn btn-danger', 'confirm' => '本当に削除しますか?']); ?>

                            </td>
                        </tr>
<?php endforeach; ?>

                </table>


            </div>

        </div>

    </div>
    <!-- ビューで表示したいものはここに配置します。 -->

</div>




