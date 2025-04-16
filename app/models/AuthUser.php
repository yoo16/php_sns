<?php
namespace App\Models;

class AuthUser extends User
{
    /**
     * コンストラクタ
     *
     * インスタンス生成時にプロパティ等の初期化が必要であれば行います。
     */
    public function __construct()
    {
        parent::__construct();
    }

    public static function getAuthUser()
    {
        // セッションから認証ユーザ情報を取得
        $auth_user = $_SESSION[APP_KEY]['auth_user'] ?? null;
        // 認証ユーザ情報が存在しない場合は null を返す
        if (empty($auth_user)) {
            return null;
        }
        // 認証ユーザ情報を返す
        return $auth_user;
    }

    public static function isLogin()
    {
        // セッションから認証ユーザ情報を取得
        $auth_user = self::getAuthUser();
        // 認証ユーザ情報が存在する場合は true を返す
        return !empty($auth_user);
    }

    public static function checkLogin()
    {
        // セッションから認証ユーザ情報を取得
        $auth_user = self::getAuthUser();
        // 認証ユーザ情報が存在しない場合はログイン画面にリダイレクト
        if (empty($auth_user)) {
            header('Location: ../login/');
            exit;
        } else {
            return $auth_user;
        }
    }

    public static function logout($user)
    {
        // セッションから認証ユーザ情報を削除
        unset($_SESSION[APP_KEY]['auth_user']);
        // ログアウト処理後のリダイレクト先を指定
        header('Location: ../login/');
        exit;
    }

}
