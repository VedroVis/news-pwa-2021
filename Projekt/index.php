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
        <hr id="hrgray" />
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-lg-8 mx-auto">
                <main>
                    <section id="europa">
                        <hr class="hrblack">
                        <ul>
                            <li>
                                <h3>EUROPA</h3>
                            </li>
                        </ul>

                        <div class="container">
                            <div class="row">
                            <?php
                                    include 'connect.php';
                                    
                                    
                                        $query = "SELECT * FROM articles WHERE archive =0 AND category='europa' LIMIT 3";
                                        $result = mysqli_query($dbc, $query);
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<div class="col-md-12 col-lg-4">';
                                            echo '<article>';
                                            echo '<img class="articleImg" src="' . 'img/' . $row['image'] . '"/>';
                                            echo '<h4 class="artTit"><a href="clanak.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h4>';
                                            echo '<h5>| ';
                                            echo $row['date'] . '</h5>';
                                            echo '</article>';
                                            echo '</div>';
                                        } ?>
                            </div>
                        </div>
                    </section>

                    <section id="teknautas">
                        <hr class="hrblack">
                        <ul>
                            <li>
                                <h3>TEKNAUTAS</h3>
                            </li>
                        </ul>

                        <div class="container">
                            <div class="row">
                                    <?php
                                    include 'connect.php';
                                    
                                    
                                        $query = "SELECT * FROM articles WHERE archive = 0 AND category='teknautas' LIMIT 3";
                                        $result = mysqli_query($dbc, $query);
                                        $i = 0;
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo '<div class="col-md-12 col-lg-4">';
                                            echo '<article>';
                                            echo '<img class="articleImg" src="' . 'img/' . $row['image'] . '"/>';
                                            echo '<h4 class="artTit"><a href="clanak.php?id=' . $row['id'] . '">' . $row['title'] . '</a></h4>';
                                            echo '<h5>| ';
                                            echo $row['date'] . '</h5>';
                                            echo '</article>';
                                            echo '</div>';
                                        } ?>
                            </div>
                        </div>

                    </section>
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