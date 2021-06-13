<?php
    $imgname = $_FILES['naImg']['name'];
    $dir = "img/" . $imgname;
    move_uploaded_file($_FILES['naImg']['tmp_name'], $dir);

    include 'connect.php';
    $picture = $_FILES['naImg']['name'];
    $title = $_POST['naTitle'];
    $about = $_POST['naSummary'];
    $content = $_POST['naContent'];
    $category = $_POST['naCategory'];
    $date = date('d.m.Y.');
    if (isset($_POST['naShow'])) {
        $archive = 0;
    } else {
        $archive = 1;
    }
    
    $query = "INSERT INTO `news` . `articles` (date, title, summary, content, image, category, 
    archive) VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";
    $result = mysqli_query($dbc, $query) or die('Error querying databese.');
    if($dbc) {echo('Article uploaded.');}
    mysqli_close($dbc);


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
        <hr id="hrgray"/>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 mx-auto">
                <main>
                    <article id="articleTeknautas">
                        <ul class="mt-2">
                            <li>
                                <h3>
                                    <?php echo $_POST['naCategory']; ?>
                                </h3>
                            </li>
                        </ul>

                        <h1>
                            <?php echo $_POST['naTitle']; ?>
                        </h1>
    
                        <h5>
                            <?php echo $_POST['naSummary']; ?>
                        </h5>

                        <div class="iceberg">
                            <img src="<?php echo "img/$imgname"?>" title="" alt="" width="100%"> 
                        </div>

                        <hr id="hrgray"/>

                        <div class="articleParagraph">
                            <div class="articleDate mt-2 md-4">
                                <h3>
                                    | <?php echo date("m.d.y"); ?>
                                </h3>
                            </div>

                            <p>
                                <?php echo $_POST['naContent']; ?>
                            </p>
                        </div>
                        
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


