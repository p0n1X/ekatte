<?php
include('controller/Controller.php');

use APP\Controller\Controller\DataController;

$data_controller = new DataController;
$page = $_GET['page'] ?? 0;

if (isset($_GET['filter'])) {
    [$all_data, $current_page, $prev, $next, $pages] = $data_controller->get_filtered_data($_GET['filter'], $page);
} else {
    [$all_data, $current_page, $prev, $next, $pages] = $data_controller->get_data($page);
}

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Единният класификатор на административно-териториалните и териториални единици</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/">Единният класификатор на административно-териториалните и териториални единици</a>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <!-- Filter widget-->
        <div class="card mx-4 my-2 px-0">
            <div class="card-header">Филтри за търсене</div>
            <div class="card-body">
                <div class="container">
                    <form method="GET" action="/">
                        <div class="row align-items-start">
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="ekatte">ЕКАТТЕ</label>
                                    <input type="text" class="form-control" id="ekatte" name="filter[ekatte]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['ekatte'] : "";?> >
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="t_v_m">Вид</label>
                                    <input type="text" class="form-control" id="t_v_m" name="filter[t_v_m]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['t_v_m'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="name">Име</label>
                                    <input type="text" class="form-control" id="name" name="filter[name]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['name'] : "";?>>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="name_en">Транслитерация</label>
                                    <input type="text" class="form-control" id="name_en" name="filter[name_en]"
                                           value=<?php echo isset($_GET['filter']) ? $_GET['filter']['name_en'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="oblast">Код на областта</label>
                                    <input type="text" class="form-control" id="oblast" name="filter[oblast]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['oblast'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="oblast_name">Име на областта</label>
                                    <input type="text" class="form-control" id="oblast_name" name="filter[oblast_name]"
                                           value=<?php echo isset($_GET['filter']) ? $_GET['filter']['oblast_name'] : "";?>>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="obshtina">Код на общината</label>
                                    <input type="text" class="form-control" id="obshtina" name="filter[obshtina]"
                                           value=<?php echo isset($_GET['filter']) ? $_GET['filter']['obshtina'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="obshtina_name">Име на общината</label>
                                    <input type="text" class="form-control" id="obshtina_name"
                                           name="filter[obshtina_name]"
                                           value=<?php echo isset($_GET['filter']) ? $_GET['filter']['obshtina_name'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="kmetstvo">Кметство</label>
                                    <input type="text" class="form-control" id="kmetstvo" name="filter[kmetstvo]"
                                           value=<?php echo isset($_GET['filter']) ? $_GET['filter']['kmetstvo'] : "";?>>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="nuts1">NUTS1</label>
                                    <input type="text" class="form-control" id="nuts1" name="filter[nuts1]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['nuts1'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="nuts2">NUTS2</label>
                                    <input type="text" class="form-control" id="nuts2" name="filter[nuts2]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['nuts2'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="nuts3">NUTS3</label>
                                    <input type="text" class="form-control" id="nuts3" name="filter[nuts3]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['nuts3'] : "";?>>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-start">
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="kind">Код на типа</label>
                                    <input type="number" class="form-control" id="kind" name="filter[kind]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['kind'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="category">Код на категорията</label>
                                    <input type="number" class="form-control" id="category" name="filter[category]"
                                           value=<?php echo isset($_GET['filter']) ? $_GET['filter']['category'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="abc">Надморска височина</label>
                                    <input type="number" class="form-control" id="abc" name="filter[abc]" value=<?php echo isset($_GET['filter']) ? $_GET['filter']['abc'] : "";?>>
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group mb-2">
                                    <label for="document">Код на документа</label>
                                    <input type="number" class="form-control" id="document" name="filter[document]"
                                           value=<?php echo isset($_GET['filter']) ? $_GET['filter']['document'] : "";?>>
                                </div>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Търсене</button>
                            </div>
                            <div class="col">
                                <a class="btn btn-secondary" href="/" role="button">Изчисти</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard widget -->
    <div class="row align-items-start">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>ЕКАТТЕ</th>
                        <th>Вид</th>
                        <th>Име на населено място</th>
                        <th>Транслитерация</th>
                        <th>Код на областта</th>
                        <th>Име на областта</th>
                        <th>Код на общината</th>
                        <th>Име на общината</th>
                        <th>Кметство</th>
                        <th>NUTS1</th>
                        <th>NUTS2</th>
                        <th>NUTS3</th>
                        <th>Код на типа</th>
                        <th>Код на категорията</th>
                        <th>Надморска височина</th>
                        <th>Надморска височина стойност</th>
                        <th>Код на документа</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_data as $data) {
                        echo "<tr>";
                        echo "<th> " . $data['ekatte'] . " </th>";
                        echo "<td>" . $data['t_v_m'] . "</td>";
                        echo "<td>" . $data['name'] . "</td>";
                        echo "<td>" . $data['name_en'] . "</td>";
                        echo "<td>" . $data['oblast'] . "</td>";
                        echo "<td>" . $data['oblast_name'] . "</td>";
                        echo "<td>" . $data['obshtina'] . "</td>";
                        echo "<td>" . $data['obshtina_name'] . "</td>";
                        echo "<td>" . $data['kmetstvo'] . "</td>";
                        echo "<td>" . $data['nuts1'] . "</td>";
                        echo "<td>" . $data['nuts2'] . "</td>";
                        echo "<td>" . $data['nuts3'] . "</td>";
                        echo "<td>" . $data['kind'] . "</td>";
                        echo "<td>" . $data['category'] . "</td>";
                        echo "<td>" . $data['abc'] . "</td>";
                        echo "<td>" . $data['text'] . "</td>";
                        echo "<td>" . $data['document'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <?php if ($pages > 10) { ?>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item <?php if ($page <= 1) {
                                echo 'disabled';
                            } ?>">
                                <a class="page-link"
                                   href="<?php if ($page <= 1) {
                                       echo '#';
                                   } else {
                                       if(isset($_GET['filter'])){
                                           echo "?". http_build_query(array_merge($_GET,array('page' => $prev)));
                                       } else {
                                           echo "?page=" . $prev;
                                       }
                                   } ?>">Previous</a>
                            </li>

                            <?php for ($i = $current_page - 2; $i <= $current_page + 2; $i++): ?>
                                <li class="page-item <?php if ($page == $i) {
                                    echo 'active';
                                } ?>">
                                    <a class="page-link" href="<?php if(isset($_GET['filter'])){
                                        echo "?". http_build_query(array_merge($_GET,array('page' => $i)));
                                    } else {
                                        echo "?page=" . $i;
                                    }
                                    ?>"> <?= $i; ?> </a>
                                </li>
                            <?php endfor; ?>

                            <li class="page-item <?php if ($page >= $pages) {
                                echo 'disabled';
                            } ?>">
                                <a class="page-link"
                                   href="<?php if ($page >= $pages) {
                                       echo '#';
                                   } else {
                                       if(isset($_GET['filter'])){
                                           echo "?". http_build_query(array_merge($_GET,array('page' => $next)));
                                       } else {
                                           echo "?page=" . $next;
                                       }
                                   } ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
