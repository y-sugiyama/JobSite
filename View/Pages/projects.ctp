<?php
$this->assign('title', 'JobSite 求人詳細');
?>
<?php
$this->start('topheader');
?>
<div class="topbackground1">
    <div class="container">
        <h1>JobSite 求人</h1>
        <p class="lead">  </div>

</div>

<?php
$this->end();
?>

<!-- Example row of columns -->

 <div class="categoryview" >
        <h4>カテゴリ一覧</h4>
   &nbsp;
        <h5>Web/システム開発</h5> &nbsp; <h5>アプリ開発</h5> &nbsp; 
        <h5>運用･保守</h5> &nbsp; <h5>デザイン</h5> &nbsp; <h5>ゲーム</h5>
    </div>


<div class="row">
    <?php foreach ($jobs as $job): ?>
        <div class="col-sm-6 col-md-4" id="projects">
            <div class="thumbnail">
                <!--<div class="caption">-->
                    <!--<span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span>-->
                <h6> <?php echo h($job['Job']['created']); ?></h6>
                <h3> <?php echo h($job['Job']['title']); ?> </h3>
                <p> <?php echo h($job['Job']['description']) ?></p>
                <h5> <?php echo h($job['Category']['name']); ?> </h5>
                <p><?php echo $this->Html->link('もっと見る>>', array('controller' => 'pages', 'action' => 'view', $job['Job']['id'])); ?></p>


                <!--</div>-->
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!--<div class="pagination">-->   
<nav aria-label="pagination">
    <ul class="pagination pagination-lg"> 

        <?php
        echo $this->Paginator->prev(
                '前へ', //タイトル
                [                      //通常時のタイトルのオプション
            'tag' => 'li', //タグをラッピングするタグ
//                    'class' => 'prev',
                ], null, //無効時のタイトル
                [                      //無効時のオプション
            'tag' => 'li',
            'class' => 'disabled',
//                    'class' => 'previous disabled',
            'disabledTag' => 'a',
                ]
        );
        ?>

        <?php
        echo $this->Paginator->numbers([
            //生成されたリンクの間に置くテキスト
            'separator' => '',
            //現在のページ番号として使うタグ
            'currentTag' => 'a',
            //'currentClass' => 'active',
            //タグをラッピングするのに使うタグ
            'tag' => 'li',
            'first' => 1,
            //省略を表すテキスト
            'ellipsis' => '<li class="disabled"><a>...</a></li>'
        ]);
        ?>

        <?php
        echo $this->Paginator->next(
                //タイトル
                '次へ',
                //通常時のタイトルのオプション
                [
            //タグをラッピングするタグ
            'tag' => 'li',
            'class' => 'next'
                ],
                //無効時のタイトル
                null,
                //無効時のオプション
                [
            'tag' => 'li',
            'class' => 'disabled',
            'disabledTag' => 'a',
                ]
        );
        ?>
    </ul>
</nav>
<!--</div>-->