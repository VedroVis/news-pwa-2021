<?php
include 'connect.php';
session_start();
$uspjesnaPrijava = false;
// Putanja do direktorija sa slikama
define('UPLPATH', 'img/');
// Provjera da li je korisnik došao s login forme
if (isset($_POST['prijava'])) {
    // Provjera da li korisnik postoji u bazi uz zaštitu od SQL injectiona
    $prijavaImeKorisnika = $_POST['username'];
    $prijavaLozinkaKorisnika = $_POST['lozinka'];
    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik
 WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    mysqli_stmt_bind_result(
        $stmt,
        $imeKorisnika,
        $lozinkaKorisnika,
        $levelKorisnika
    );
    mysqli_stmt_fetch($stmt);
    //Provjera lozinke
    if (
        password_verify($_POST['lozinka'], $lozinkaKorisnika) &&
        mysqli_stmt_num_rows($stmt) > 0
    ) {
        $uspjesnaPrijava = true;
        // Provjera da li je admin
        if ($levelKorisnika == 1) {
            $admin = true;
        } else {
            $admin = false;
        }
        //postavljanje session varijabli
        $_SESSION['$username'] = $imeKorisnika;
        $_SESSION['$level'] = $levelKorisnika;
    } else {
        $uspjesnaPrijava = false;
    }
}
// Brisanje i promijena arhiviranosti
?>
<?php
// Pokaži stranicu ukoliko je korisnik uspješno prijavljen i administrator je
if (($uspjesnaPrijava == true && $admin == true) ||
    (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1){
    include 'Jn0aXvrxeXFuFDqg.php';
}else if ($uspjesnaPrijava == true && $admin == false) {
    echo '<p>Bok ' . $imeKorisnika . '! Uspješno ste prijavljeni, ali 
niste administrator.';
} else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) {
    echo '<p>Bok ' . $_SESSION['$username'] . '! Uspješno ste 
prijavljeni, ali niste administrator.</p>';
} else if ($uspjesnaPrijava == false) {
?>
    <a href="registracija.php">Ukoliko niste registrirani, učinite to ovdje.</a>
    <br />
    <form action="login.php" method="POST">
        <label for="username">Username</label> <br />
        <input type="text" name="username" id="username"><br />
        <span id="porukaUsername"></span><br />
        <label for="lozinka">Password</label><br />
        <input type="password" name="lozinka" id="lozinka"><br />
        <span id="porukaLozinka"></span><br />
        <input type="submit" id="slanje" name="prijava"><br />
    </form>

    <script type="text/javascript">
        document.getElementById("slanje").onclick = function(event) {

            var slanjeForme = true;

            // Korisnicko Ime korisnika mora biti uneseno
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username.length == 0) {
                slanjeForme = false;
                poljeUsername.style.border = "1px dashed red";
                document.getElementById("porukaUsername").innerHTML = "Unesite korisničko ime!";
            } else {
                poljeUsername.style.border = "1px solid green";
                document.getElementById("porukaUsername").innerHTML = "";
            }

            //lozinka

            var poljeLozinka = document.getElementById("lozinka");
            var lozinka = document.getElementById("lozinka").value;
            if (lozinka.length == 0) {
                slanjeForme = false;
                poljeLozinka.style.border = "1px dashed red";
                document.getElementById("porukaLozinka").innerHTML = "Unesite lozinku!";
            } else {
                poljeLozinka.style.border = "1px solid green";
                document.getElementById("porukaLozinka").innerHTML = "";
            }

            if (slanjeForme != true) {
                event.preventDefault();
            }
        }
    </script>
<?php
}
?>