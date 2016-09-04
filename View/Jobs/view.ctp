
<div class="row" id="jobsview">
    <div class="col-md-9">
        <h2><?php echo __('求人詳細'); ?></h2>

        <table class="table table-bordered">  
            <tr>
                <th><?php echo __('Id'); ?></th>
                <td><?php echo h($job['Job']['id']); ?></td>
            </tr>
            <tr>
                <th><?php echo __('タイトル'); ?></th>
                <td><?php echo h($job['Job']['title']); ?></td>
            </tr>
            <tr>
                <th><?php echo __('カテゴリ'); ?></th>
                <td><?php echo h($job['Category']['name']); ?></td>
            </tr>
            <tr>
                <th><?php echo __('会社名'); ?></th>
                <td>
                <?php echo h($job['Job']['companyname']); ?>
                </td>
            </tr>
             <tr>
                <th><?php echo __('給与'); ?></th>
                <td>
                <?php echo h($job['Job']['salary']); ?>万円
                </td>
            </tr>
             <tr>
                <th><?php echo __('エリア'); ?></th>
                <td>
                <?php echo h($job['Area']['name']); ?>
                </td>
            </tr>
            <tr>
                <th><?php echo __('求人内容'); ?></th>
                <td><?php echo h($job['Job']['description']); ?></td>

            </tr>

        </table>
</div>

