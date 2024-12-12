<?php
require_once __DIR__ . "/../../Model/Model.php";
require_once __DIR__ . "/../../Model/Category.php";

$keyword = $_GET['search'];
$categories = new Category();
$categories = $categories->SearchC($keyword);


?>
<div id="content" class="table-responsive">
    <table class="table table-striped">
        <tr>
            <th>
                <!-- <div class="custom-checkbox custom-control">
                                                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                            <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                        </div> -->
            </th>
            <th>Task Name</th>
            <th>Progress</th>
        </tr>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td class="p-0 text-center">
                    <div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                        <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                    </div>
                </td>
                <td><?= $category["category_name"] ?></td>
                <td>
                    <a href="index.php?id=<?= $category['id'] ?>" class="btn btn-primary mr-2"><i class="fas fa-info-circle"></i></a>
                    <a href="index.php?id=<?= $category['id'] ?>" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                    <a href="index.php?id=<?= $category['id'] ?>" class="btn btn-danger mr-2"><i class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>