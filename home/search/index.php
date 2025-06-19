<?php
// 共通ファイル app.php を読み込み
require_once '../../app.php';

use App\Models\AuthUser;
use App\Models\Tweet;


// TODO: ユーザセッションの確認し、ログインしていない場合はログイン画面にリダイレクト
$auth_user = AuthUser::checkLogin();

// 検索キーワードの取得
$keyword = h($_GET['keyword'] ?? "");

$tweet = new Tweet();
$tweets = $tweet->search($keyword);
?>

<!DOCTYPE html>
<html lang="ja">

<!-- TODO: コンポーネント: components/head.php -->
<?php include COMPONENT_DIR . 'head.php' ?>

<body>

    <div class="flex mx-auto container">

        <header class="w-1/5 p-3 border-r min-h-screen">
            <!-- TODO: components/nav.php 読み込み -->
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <main class="w-4/5 pt-3">
            <?php include COMPONENT_DIR . 'search_form.php' ?>

            <div class="row">
                <!-- TODO: components/tweet_form.php 読み込み -->
                <?php include COMPONENT_DIR . 'tweet_form.php' ?>
            </div>

            <?php if ($tweets !== null): ?>
                <p class="px-4 py-2 font-bold">
                    検索キーワード: <span class=""><?= h($keyword) ?></span><br>
                </p>
                <p class="px-4 py-2 font-bold">
                    <?= count($tweets) ?> 件の投稿が検索されました
                </p>
            <?php endif; ?>

            <? if ($tweets) : ?>
                <?php foreach ($tweets as $value): ?>
                    <div class="row">
                        <!-- TODO: components/tweet.php 読み込み -->
                        <?php include COMPONENT_DIR . 'tweet.php' ?>
                    </div>
                <?php endforeach ?>
            <? endif ?>
        </main>
    </div>

</body>

</html>