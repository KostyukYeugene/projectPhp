<?php

use ProjectPhp\Services\View;

$lastPage = View::getData()['lastPage'];
$currentPage = View::getData()['currentPage']
?>
<?php if ($currentPage < 5) { ?>
    <nav aria-label="..." class="pag">
    <ul class="pagination">
        <li class="page-item <?= ($currentPage == 1) ? 'active' : '' ?>">
            <a class="page-link" href="?page=1 ">1</a>
        </li>
        <li class="page-item <?= ($currentPage == 2) ? 'active' : '' ?>">
            <a class="page-link" href="?page=2">2</a>
        </li>
        <li class="page-item <?= ($currentPage == 3) ? 'active' : '' ?>">
            <a class="page-link" href="?page=3">3</a>
        </li>
        <li class="page-item <?= ($currentPage == 4) ? 'active' : '' ?>">
            <a class="page-link" href="?page=4">4</a>
        </li>
        <li class="page-item <?= ($currentPage == 5) ? 'active' : '' ?>">
            <a class="page-link" href="?page=5">5</a>
        </li>
        <li class="page-item"><a class="page-link" href="?page=<?= $currentPage+10 ?>">...</a></li>
        <li><a class="page-link" href="?page=<?= $lastPage; ?>"><?=$lastPage; ?></a></li>
        <li class="page-item">
            <a class="page-link" href="?page=<?= $currentPage + 1; ?>">Следующая</a>
        </li>
    </ul>
<?php } elseif ($currentPage <= $lastPage - 5) { ?>
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="?page=<?= $currentPage - 1; ?>">Предыдущая</a>
        </li>
        <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $currentPage-10 ?>">...</a></li>
        <?php for ($i = 0; $i < 5; $i++) { ?>
            <li class="page-item <?= ($i == 2) ? 'active' : '' ?>">
              <a class="page-link" href="?page=<?= $currentPage - 2 + $i; ?>"><?= $currentPage - 2 + $i; ?></a>
            </li>
            <?php } ?>
        <li class="page-item"><a class="page-link" href="?page=<?= $currentPage+10 ?>">...</a></li>
        <li><a class="page-link" href="?page=<?= $lastPage; ?>"><?= $lastPage; ?></a></li>
        <li class="page-item">
            <a class="page-link" href="?page=<?= $currentPage + 1; ?>">Следующая</a>
    </ul>
<?php } else { ?>
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="?page=<?= $currentPage - 1; ?>">Предыдущая</a>
        </li>
        <li class="page-item"><a class="page-link" href="?page=1">1</a></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $currentPage-10 ?>">...</a></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $lastPage - 5; ?>"><?= $lastPage - 5; ?></a></li>
        <li class="page-item">
            <a class="page-link" href="?page=<?= $lastPage - 4; ?>"><?= $lastPage - 4; ?></a>
        </li>
        <li class="page-item"><a class="page-link" href="?page=<?= $lastPage - 3; ?>"><?= $lastPage - 3; ?></a></li>
        <li class="page-item active"><span class="sr-only">(current)</span></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $lastPage - 2; ?>"><?= $lastPage - 2; ?></a></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $lastPage - 1; ?>"><?= $lastPage - 1; ?></a></li>
        <li class="page-item"><a class="page-link" href="?page=<?= $lastPage; ?>"><?= $lastPage; ?></a></li>
    </ul>
    </nav>
<?php } ?>