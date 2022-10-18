<?php
require_once 'includes/init.php';
$conn = require 'includes/db.php';
$product = new Product();
$categories = $product->getCategories($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Products</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type='text/css' href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/fontawesome.min.css">
    <link rel="stylesheet" type='text/css' href="css/style.css">
</head>

<body>
    <div role="navigation" class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/solomono1">Home</a></li>
                    <li><a href="/solomono2">Task 2</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container" style="min-height:500px;">
        <div class="content">
            <div class="container-fluid">
                <h2>Products Filtering using Ajax, PHP and MySQL</h2>
                <form method="GET" id="search_form">
                    <div class="row">
                        <aside class="col-lg-3 col-md-4">
                            <div class="panel list">
                                <div class="panel-heading">
                                    <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Categories</h3>
                                </div>
                                <div class="panel-body collapse in" id="panelOne">
                                    <ul class="list-group">
                                        <?php
                                        $categoryCheck = "";
                                        foreach ($categories as $key => $category) {
                                            if (isset($_GET['category'])) {
                                                if (in_array($category['id'], $_GET['category'])) {
                                                    $categoryCheck = 'checked="checked"';
                                                } else {
                                                    $categoryCheck = "";
                                                }
                                            }
                                        ?>
                                            <li class="list-group-item">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" value="<?= $category['id'] ?>" <?= $categoryCheck ?> name="category[]" class="sort_rang category">
                                                        <?= $category['title'] ?> (<?= $category['product_count'] ?>)
                                                    </label>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel list">
                                <div class="panel-heading">
                                    <h3 class="panel-title" data-toggle="collapse" data-target="#panelOne" aria-expanded="true">Sort by </h3>
                                </div>
                                <div class="panel-body collapse in" id="panelOne">
                                    <div class="radio disabled">
                                        <label><input type="radio" name="sorting" value="newest" <?php if (isset($_GET['sorting']) && ($_GET['sorting'] == 'newest' || $_GET['sorting'] == '')) {
                                                                                                        echo "checked";
                                                                                                    } ?> class="sort_rang sorting">Newest</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="sorting" value="lowest_price" <?php if (isset($_GET['sorting']) && $_GET['sorting'] == 'lowest_price') {
                                                                                                            echo "checked";
                                                                                                        } ?> class="sort_rang sorting">Price: Low to High</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="sorting" value="alphabet" <?php if (isset($_GET['sorting']) && $_GET['sorting'] == 'alphabet') {
                                                                                                        echo "checked";
                                                                                                    } ?> class="sort_rang sorting">Alphabet</label>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <section class="col-lg-9 col-md-8">
                            <div class="row">
                                <div id="results"></div>
                            </div>
                        </section>
                    </div>
                </form>
            </div>
            <!-- Single Product Modal -->
            <div class="modal" id="productModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Product Info</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>