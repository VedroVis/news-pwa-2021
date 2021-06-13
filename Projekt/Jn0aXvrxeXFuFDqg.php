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

        <div class="container">
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
        <main>
             <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center"> 
                    <?php
                        
                        include 'connect.php';
                        $query = "SELECT * FROM articles";
                        $result = mysqli_query($dbc, $query);
      
                        while($row = mysqli_fetch_array($result)) {
                        echo '
                        <div class="d-flex adminform m-3 p-1">
                        <form enctype="multipart/form-data" action="" method="POST">
                        <div class="form-item">
                            <label for="title">Naslov vijesti:</label>
                            <div class="form-field">
                                <input type="text" name="title" class="form-field-textual" value="'.$row['title'].'">
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="about">Kratki sadržaj vijesti (do 50
                                znakova):</label>
                            <div class="form-field">
                                <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['summary'].'</textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="content">Sadržaj vijesti:</label>
                            <div class="form-field">
                                <textarea name="content" id="" cols="30" rows="10" class="formfield-textual">'.$row['content'].'</textarea>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="pphoto">Slika:</label>
                            <div class="form-field">
                                <input type="file" class="input-text" id="pphoto" value="'.$row['image'].'" name="pphoto" /> <br><img src="' . 'img/' . 
                                $row['image'] . '" width=100px>
                            </div>
                        </div>
                        <div class="form-item">
                            <label for="category">Kategorija vijesti:</label>
                            <div class="form-field">
                                <select name="category" id="" class="form-field-textual" value="'.$row['category'].'">
                                    <option value="europe">Europe</option>
                                    <option value="teknautas">Teknautas</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-item">
                            <label>Spremiti u arhivu:
                                <div class="form-field">';
                                    if($row['archive'] == 0) {
                                    echo '<input type="checkbox" name="archive" id="archive" />
                                    Arhiviraj?';
                                    } else {
                                    echo '<input type="checkbox" name="archive" id="archive" checked /> Arhiviraj?';
                                    }
                                    echo '</div>
                            </label>
                        </div>
                        <div class="form-item">
                            <input type="hidden" name="id" class="form-field-textual" value="'.$row['id'].'">
                            <button type="reset" value="Poništi">Poništi</button>
                            <button type="submit" name="update" value="Prihvati">
                                Izmjeni</button>
                            <button type="submit" name="delete" value="Izbriši">
                                Izbriši</button>
                        </div>
                    </form>
                        </div>';
                        
                    }

                    if(isset($_POST['delete'])){
                        $id=$_POST['id'];
                        $query = "DELETE FROM articles WHERE id=$id ";
                        $result = mysqli_query($dbc, $query);
                       }

                       if(isset($_POST['update'])){
                       $picture = $_FILES['pphoto']['name'];
                       $title=$_POST['title'];
                       $about=$_POST['about'];
                       $content=$_POST['content'];
                       $category=$_POST['category'];
                       if(isset($_POST['archive'])){
                        $archive=1;
                       }else{
                        $archive=0;
                       }

                       $target_dir = 'img/'.$picture;
                       move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
                       $id=$_POST['id'];
                       $query = "UPDATE articles SET title='$title', summary='$about', content='$content', 
                       image='$picture', category='$category', archive='$archive' WHERE id=$id ";
                       $result = mysqli_query($dbc, $query);
                       }
                       
                    ?>
                    </div>
                </div>
           </main> 
        

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