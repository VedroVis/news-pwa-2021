
<?php
    $article_id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>El Confidencial</title>
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="naslov">
                        <h1>El Confidencial</h1>
                        <h5>EL DIARIO DE LOS LECTORES INFLUYENTES</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class=container>
            <div class="row">
                <div class="col-xs-6 col-md-12 text-center">
                    <nav>
                        <ul>
                        <li><a href="index.php">HOME</a></li>
                            <li><a href="kategorija.php?id=europa">EUROPA</a></li>
                            <li><a href="kategorija.php?id=teknautas">TEKNAUTAS</a></li>
                            <li><a href="unos.php">UNOS</a></li>
                            <li><a href="login.php">ADMINISTRACIJA</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <hr class="hrgray"/>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 mx-auto">
                <main>
                    <article id="articleTeknautas">
                    <?php
                        include 'connect.php';
                        $query = "SELECT * FROM articles WHERE id = '$article_id' ";
                        $result = mysqli_query($dbc, $query);
                        while($row = mysqli_fetch_array($result)) {
                            echo '
                        <ul class="mt-2">
                            <li>
                                <h3>' . $row['category'] . ' </h3>
                            </li>
                        </ul>

                        <h1>'
                            . $row['title'] . '
                        </h1>
    
                        <h5>'
                            . $row['summary'] . '
                        </h5>
                        <div class="iceberg">
                             <img src="img/' . $row['image'] . '"/>' . '
                        </div>

                        <hr class="hrgray"/>

                        <div class="articleParagraph">
                            <div class="articleDate mt-2 md-4">
                                <h3>
                                    | ' . $row['date'] . '
                                </h3>
                            </div>

                            <p>
                                ' . $row['content'] . '
                            </p>

                            <p>
                                ' . $row['content'] . '
                            </p>
                        </div> ';}
                        ?>
                    </article>
                </main>
            </div>
        </div>
    </div>

    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-md-12">
                    <ul>
                        <li>© TITANIA COMPAÑÍA EDITORIAL, S.L. 2021. España. Todos los derechos reservados</li>
                        <li>Condiciones</li>
                        <li>Política de Privacidad</li>
                        <li>Política de Cookies</li>
                        <li>Transparencia</li>
                        <li>Auditado por Comscore</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>