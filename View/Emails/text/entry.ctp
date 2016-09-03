<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Emails.text
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
?>
<!--自分が設定したメールアドレスへ送信するメッセージの内容-->

JobSiteエントリーフォームへ以下の内容が送信されました｡

<!--エントリーフォームタイトル-->
エントリー:
<?php echo $subject; ?>

<!--エントリーされた方の名前-->
名前:
<?php echo $name; ?>

<!--エントリーされた方のメールアドレス-->
メールアドレス:
<?php echo $email; ?>

<!--エントリーされた方の年齢-->
年齢:
<?php echo $age; ?>

<!--エントリーされた方の電話番号-->
電話番号:
<?php echo $tel; ?>

<!--エントリーされた方の住所-->
住所:
<?php echo $address; ?>
 
<!--備考(質問内容)-->
本文:
<?php echo $body; 