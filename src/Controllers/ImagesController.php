<?php

namespace ProjectPhp\Controllers;

use ProjectPhp\Services\FileViewer;

class ImagesController
{
    private const DEFAULT_IMAGE = __DIR__ . '/../Views/Resources/Images/notfound.jpg';

    public function showAction(): void
    {
        $imageName = '';

        if (isset($_GET['image'])) {
            $imageName = (string)$_GET['image'];
            $imageName = basename($imageName);
        }

        $imagePath = __DIR__ . '/../Views/Resources/Images/' . $imageName;

        if (is_file($imagePath) && file_exists($imagePath)) {
            FileViewer::viewContent($imagePath);
            return;
        }

        FileViewer::viewContent(self::DEFAULT_IMAGE);
    }
}
