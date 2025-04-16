<?php
class File
{
    public static function isExistsLocal($path)
    {
        // ローカルパスを指定
        $localPath = BASE_DIR . '/' . $path;
        // ファイルが存在するか確認
        return file_exists($localPath);
    }

    public static function getUploadDir($uploadDir)
    {
        // アップロード先のディレクトリを指定
        $localDir = BASE_DIR . '/' . $uploadDir;
        // ディレクトリが存在しない場合は作成
        if (!is_dir($localDir)) {
            mkdir($localDir, 0777, true);
        }
        // ディレクトリのパーミッションを設定
        chmod($localDir, 0777);
        return $localDir;
    }

    public static function upload($uploadDir, $key = 'file')
    {
        // 画像がアップロードされているか確認
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
            // アップロードされたファイルの情報を取得
            $tmpPath = $_FILES[$key]['tmp_name'];
            // 画像の拡張子を取得
            $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
            // 画像ファイル名
            $imageFileName = uniqid() . '.' . $extension;
            // アップロード先のディレクトリを指定
            $destPath = self::getUploadDir($uploadDir) . $imageFileName;
            // ファイルを指定したディレクトリに移動
            if (move_uploaded_file($tmpPath, $destPath)) {
                return $uploadDir . $imageFileName;
            }
        }
        return null;
    }
}
