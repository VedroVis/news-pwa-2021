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
                    <form action="skripta.php" method="POST" name="newArticle" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td>Naslov: </td>
                                <td>
                                    <input type="text" name="naTitle" id="title" />
                                    <span id="porukaTitle"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Kratki sažetak: </td>
                                <td>
                                    <textarea name="naSummary" id="about" rows="4" cols="50"></textarea>
                                    <span id="porukaAbout"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Cijeli tekst: </td>
                                <td>
                                    <textarea name="naContent" id="content" rows="8" cols="50"></textarea>
                                    <span id="porukaContent"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Kategorija: </td>
                                <td>
                                    <select name="naCategory" id="category">
                                        <option value="null">&nbsp;</option>
                                        <option value="europa">Europa</option>
                                        <option value="teknautas">Teknautas</option>
                                    </select>
                                    <span id="porukaKategorija"></span>
                                </td>
                            </tr>


                            <tr>
                                <td>Slika: </td>
                                <td>
                                    <input type="file" accept="image/*" name="naImg" id="pphoto">
                                    <span id="porukaSlika"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Prikaži na<br /> stranici?</td>
                                <td>
                                    <input type="checkbox" name="naShow" value="fmprikazida">
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <!--<input type="submit" name="sub" id="slanje">-->
                                    <button type="submit" value="Prihvati" id="sendForm">Prihvati</button>
                                </td>
                            </tr>
                        </table>
                    </form>
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

    <script type="text/javascript">
    document.getElementById("sendForm").onclick = function (event) {

        var slanjeForme = true;

        var poljeTitle = document.getElementById("title");
        var title = document.getElementById("title").value;
        if (title.length < 5 || title.length > 30) {
            slanjeForme = false;
            poljeTitle.style.border = "1px dashed red";
            document.getElementById("porukaTitle").innerHTML = "Naslov vijesti mora imati između 5 i 30 znakova!";
        } else {
            poljeTitle.style.border = "1px solid green";
            document.getElementById("porukaTitle").innerHTML = "";
        }

        var poljeAbout = document.getElementById("about");
        var about = document.getElementById("about").value;
        if (about.length < 10 || about.length > 100) {
            slanjeForme = false;
            poljeAbout.style.border = "1px dashed red";
            document.getElementById("porukaAbout").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!";
        } else {
            poljeAbout.style.border = "1px solid green";
            document.getElementById("porukaAbout").innerHTML = "";
        }
        var poljeContent = document.getElementById("content");
        var content = document.getElementById("content").value;
        if (content.length == 0) {
            slanjeForme = false;
            poljeContent.style.border = "1px dashed red";
            document.getElementById("porukaContent").innerHTML = "Sadržaj mora biti unesen!";
        } else {
            poljeContent.style.border = "1px solid green"; 10
            document.getElementById("porukaContent").innerHTML = "";
        }
        var poljeSlika = document.getElementById("pphoto");
        var pphoto = document.getElementById("pphoto").value;
        if (pphoto.length == 0) {
            slanjeForme = false;
            poljeSlika.style.border = "1px dashed red";
            document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena!";
        } else {
            poljeSlika.style.border = "1px solid green";
            document.getElementById("porukaSlika").innerHTML = "";
        }
        var poljeCategory = document.getElementById("category");
        if (document.getElementById("category").selectedIndex == 0) {
            slanjeForme = false;
            poljeCategory.style.border = "1px dashed red";

            document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!";
        } else {
            poljeCategory.style.border = "1px solid green";
            document.getElementById("porukaKategorija").innerHTML = "";
        }

        if (slanjeForme != true) {
            event.preventDefault();
        }

    };
    </script>
</body>

</html>