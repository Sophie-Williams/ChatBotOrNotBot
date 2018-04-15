<?php 
class Autoloader
{
    public static function loader($className)
    {
        //TODO: Add in set path and file extensions using spl_autoload_extensions
        $file = "\\Connection\\$className.php";
        include_once($file);
    }
}
?>
