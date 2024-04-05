<?php
class View
{
    static string $layout_name = 'app';

    static function render(string $name, array $data = null, array $params = null)
    {
        $layout_name = self::$layout_name;
        if (isset($params['layout'])) $layout_name = $params['layout'];

        $layout = LAYOUT_DIR . $layout_name . '.layout.php';
        $view_path = VIEW_DIR . "{$name}.view.php";

        if (file_exists($view_path)) {
            if ($data) extract($data);
            include $layout;
        } else {
            echo "Not found {$view_path}";
            exit;
        }
    }
}
