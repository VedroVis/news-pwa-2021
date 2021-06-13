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
        <hr class="hrgray" />
    </header>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 mx-auto">
                <main>
                    <?php
                    include 'connect.php';
                    $registriranKorisnik = false;
                    if(isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['username']) && isset($_POST['pass']) && isset($_POST['passRep'] )) {
                        $ime = $_POST['ime'];
                        $prezime = $_POST['prezime'];
                        $username = $_POST['username'];
                        $lozinka = $_POST['pass'];
                        $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
                    
                        $razina = 0;
                        
                        //Provjera postoji li u bazi već korisnik s tim korisničkim imenom
                        $sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
                        $stmt = mysqli_stmt_init($dbc);
                        if (mysqli_stmt_prepare($stmt, $sql)) {
                            mysqli_stmt_bind_param($stmt, 's', $username);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                        }
                        if (mysqli_stmt_num_rows($stmt) > 0) {
                            echo('Korisničko ime već postoji!');
                        } else {
                            // Ako ne postoji korisnik s tim korisničkim imenom - Registracija korisnika u bazi pazeći na SQL injection
                            $sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($dbc);
                            if (mysqli_stmt_prepare($stmt, $sql)) {
                                mysqli_stmt_bind_param(
                                    $stmt,
                                    'ssssi',
                                    $ime,
                                    $prezime,
                                    $username,
                                    $hashed_password,
                                    $razina
                                );
                                mysqli_stmt_execute($stmt);
                                $registriranKorisnik = true;
                            }
                        }
                        mysqli_close($dbc);
                    }
                    ?>

                    <?php
                    //Registracija je prošla uspješno
                    if ($registriranKorisnik == true) {
                        echo '<p>Korisnik je uspješno registriran!</p>';
                    } else {
                        //registracija nije protekla uspješno ili je korisnik prvi put došao na stranicu
                    ?>

                        <section role="main">
                            <form enctype="multipart/form-data" action="registracija.php" method="POST">
                                <div class="form-item">
                                    <span id="porukaIme" class="bojaPoruke"></span>
                                    <label for="title">Ime: </label>
                                    <div class="form-field">
                                        <input type="text" name="ime" id="ime" class="form-fieldtextual">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <span id="porukaPrezime" class="bojaPoruke"></span>
                                    <label for="about">Prezime: </label>
                                    <div class="form-field">
                                        <input type="text" name="prezime" id="prezime" class="formfield-textual">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <span id="porukaUsername" class="bojaPoruke"></span>

                                    <label for="content">Korisničko ime:</label>
                                    <!-- Ispis poruke nakon provjere korisničkog imena u bazi -->
                                    <div class="form-field">
                                        <input type="text" name="username" id="username" class="formfield-textual">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <span id="porukaPass" class="bojaPoruke"></span>
                                    <label for="pphoto">Lozinka: </label>
                                    <div class="form-field">
                                        <input type="password" name="pass" id="pass" class="formfield-textual">
                                    </div>
                                </div>
                                <div class="form-item">
                                    <span id="porukaPassRep" class="bojaPoruke"></span>
                                    <label for="pphoto">Ponovite lozinku: </label>
                                    <div class="form-field">
                                        <input type="password" name="passRep" id="passRep" class="form-field-textual">
                                    </div>
                                </div>

                                <div class="form-item">
                                    <button type="submit" value="Prijava" id="slanje">Prijava</button>
                                </div>
                            </form>

                        </section>
                        <script type="text/javascript">
                            document.getElementById("slanje").onclick = function(event) {

                                var slanjeForme = true;

                                // Ime korisnika mora biti uneseno
                                var poljeIme = document.getElementById("ime");
                                var ime = document.getElementById("ime").value;
                                if (ime.length == 0) {
                                    slanjeForme = false;
                                    poljeIme.style.border = "1px dashed red";
                                    document.getElementById("porukaIme").innerHTML = "<br>Unesite ime!";
                                } else {
                                    poljeIme.style.border = "1px solid green";
                                    document.getElementById("porukaIme").innerHTML = "";
                                }
                                // Prezime korisnika mora biti uneseno
                                var poljePrezime = document.getElementById("prezime");
                                var prezime = document.getElementById("prezime").value;
                                if (prezime.length == 0) {
                                    slanjeForme = false;
                                    13
                                    poljePrezime.style.border = "1px dashed red";

                                    document.getElementById("porukaPrezime").innerHTML = "<br>Unesite Prezime!";
                                } else {
                                    poljePrezime.style.border = "1px solid green";
                                    document.getElementById("porukaPrezime").innerHTML = "";
                                }

                                // Korisničko ime mora biti uneseno
                                var poljeUsername = document.getElementById("username");
                                var username = document.getElementById("username").value;
                                if (username.length == 0) {
                                    slanjeForme = false;
                                    poljeUsername.style.border = "1px dashed red";

                                    document.getElementById("porukaUsername").innerHTML = "<br>Unesite korisničko ime!";
                                } else {
                                    poljeUsername.style.border = "1px solid green";
                                    document.getElementById("porukaUsername").innerHTML = "";
                                }

                                // Provjera podudaranja lozinki
                                var poljePass = document.getElementById("pass");
                                var pass = document.getElementById("pass").value;
                                var poljePassRep = document.getElementById("passRep");
                                var passRep = document.getElementById("passRep").value;
                                if (pass.length == 0 || passRep.length == 0 || pass != passRep) {
                                    slanjeForme = false;
                                    poljePass.style.border = "1px dashed red";
                                    poljePassRep.style.border = "1px dashed red";
                                    document.getElementById("porukaPass").innerHTML = "<br>Lozinke nisu iste!";

                                    document.getElementById("porukaPassRep").innerHTML = "<br>Lozinke nisu iste!";
                                } else {
                                    poljePass.style.border = "1px solid green";
                                    poljePassRep.style.border = "1px solid green";
                                    document.getElementById("porukaPass").innerHTML = "";
                                    document.getElementById("porukaPassRep").innerHTML = "";
                                }

                                if (slanjeForme != true) {
                                    event.preventDefault();
                                }

                            };
                        </script>
                    <?php
                    }
                    ?>
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