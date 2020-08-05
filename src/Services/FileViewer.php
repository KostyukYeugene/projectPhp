<?php

namespace ProjectPhp\Services;

class FileViewer
{
    /**
     * @param string $filePath
     */
    public static function viewContent(string $filePath): void
    {
        $fileName = basename($filePath);
        header('Content-Type: ' . mime_content_type($filePath));
        header('Content-Disposition: inline; filename="' . $fileName . '"');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
    }
}
