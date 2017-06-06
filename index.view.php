<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <style>
        .alert-flash {
            position: fixed;
            right: 40px;
            top: 40px;
            opacity: 1;
        }

        .delete:hover {
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Редактировать товар</h4>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    <input type="hidden" id="productId" name="productId">
                    <div class="form-group">
                        <label for="productName">Название</label>
                        <input type="text" id="productName" name="productName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Категория</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->id ?>">
                                    <?= $category->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Цена</label>
                        <input type="number" id="price" name="price" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-primary" id="update">Сохранить</button>
            </div>
        </div>
    </div>
</div>

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">Список товаров</div>
        <div class="panel-body">
            <button class="btn btn-primary pull-right" id="showCreateForm">Добавить товар</button>
        </div>

        <!-- Table -->
        <table class="table">
            <thead>
            <tr>
                <th>Арт.</th>
                <th>Название</th>
                <th>Описание</th>
                <th>Категория</th>
                <th>Цена</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($goods as $product) : ?>
                <tr data-id="<?= $product->id ?>">
                    <td><?= $product->id ?></td>
                    <td><?= $product->productName ?></td>
                    <td><?= $product->description ?></td>
                    <td data-category_id="<?= $product->category_id ?>">
                        <?= $product->categoryName ?>
                    </td>
                    <td><?= $product->price ?></td>
                    <td data-id="<?= $product->id ?>" class="delete">
                        <span data-id="<?= $product->id ?>" class="glyphicon glyphicon-remove"></span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="alert alert-success alert-flash hide" role="alert" id="flash">Данные обработаны!</div>
</div>

<script src="main.js"></script>
</body>
</html>