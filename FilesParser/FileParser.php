<?php

class FileParser {
    public static string $srcPath = "scenes/";
    public static string $destPath = "scenes (parsed)/";
    public static string $commonDir = "scenes/common/";
    public static string $buildDir = "build/scenes";
    public static array $stages = [ "pre_inscricao", "inscricao", "provas" ];

    public static function parse(): bool
    {
        try {
            foreach (self::$stages as $stage ) {
                $srcPath = self::$srcPath . $stage;
                $destPath = self::$destPath . $stage;

                chdir($srcPath);

                $files = glob("{*.js,*.json,*.html,*.css,*.png}", GLOB_BRACE);

                foreach($files as $file) {
                    if ($file !== "__settings__.js" && $file !== "index.html") {
                        file_put_contents(__DIR__ . '/' . $destPath . '/' . $file, file_get_contents(__DIR__ . '/' . $srcPath . "/" . $file));
                        continue;
                    }

                    $content = file_get_contents(__DIR__ . '/' . $srcPath . "/" . $file);
                    file_put_contents(__DIR__ . '/' . $destPath . '/' . $file, self::replaceContent($content, $stage, $files, $file));
                }

                chdir(__DIR__);

                self::xcopy($srcPath . '/files', $destPath . '/files');
            }

            foreach (self::$stages as $stage) {
                $srcPath = self::$commonDir;
                $destPath = self::$destPath . $stage;

                chdir($srcPath);

                $files = glob("{*.js,*.png}", GLOB_BRACE);

                foreach ($files as $file) {
                    file_put_contents(__DIR__ . '/' . $destPath . '/' . $file, file_get_contents(__DIR__ . '/' . $srcPath . "/" . $file));
                }

                chdir(__DIR__);
            }

            return true;
        } 
        
        catch (\Exception) {
            return false;
        }
    }

    public static function replaceContent(string $content, string $stage, array $files, string $actualFile): string
    {
        switch ($actualFile) {
            case "__settings__.js": {
                $tmp = preg_replace(["/ASSET_PREFIX = \"\"/", "/SCRIPT_PREFIX = \"\"/"], ["ASSET_PREFIX = \"" . self::$buildDir. '/' . $stage . "\/\"", "SCRIPT_PREFIX = \"\""], $content);
                return preg_replace("/config.json/", self::$buildDir . '/' . $stage . "/config.json", $tmp);
                break;
            }

            default: {
                return preg_replace(array_map(function ($file) { return '/'.$file.'/'; }, $files), array_map(function ($file) use ($stage) { return self::$buildDir . '/' . $stage . '/' . $file; }, $files), $content);
            }
        }
    }

    public static function xcopy($source, $dest, $permissions = 0755)
    {
        $sourceHash = self::hashDirectory($source);
        // Check for symlinks
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }

        // Simple copy for a file
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest)) {
            mkdir($dest, $permissions);
        }

        // Loop through the folder
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Deep copy directories
            if($sourceHash != self::hashDirectory($source."/".$entry)){
                self::xcopy("$source/$entry", "$dest/$entry", $permissions);
            }
        }

        // Clean up
        $dir->close();
        return true;
    }

    // In case of coping a directory inside itself, there is a need to hash check the directory otherwise and infinite loop of coping is generated

    public static function hashDirectory($directory){
        if (! is_dir($directory)){ return false; }

        $files = array();
        $dir = dir($directory);

        while (false !== ($file = $dir->read())){
            if ($file != '.' and $file != '..') {
                if (is_dir($directory . '/' . $file)) { $files[] = self::hashDirectory($directory . '/' . $file); }
                else { $files[] = md5_file($directory . '/' . $file); }
            }
        }

        $dir->close();

        return md5(implode('', $files));
    }
}

echo FileParser::parse() ? "success" : "error";

?>