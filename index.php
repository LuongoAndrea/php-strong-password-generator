<?php
$lettere = [
    'a',
    'b',
    'c',
    'd',
    'e',
    'f',
    'd',
    'h',
    'o',
    'p',
    'q',
    'w',
    't',
    'y',
];
$numeri = [
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    '0'
];
$simboli = [
    '*',
    '+',
    '^',
    '-',
    '§',
    '"'
];

$lunghMax = 0;
$selezionate = [];
if (isset($_GET['lettere'])) {
    $lunghMax = $lunghMax + count($lettere);
    array_push($selezionate, 'lettere');
}
if (isset($_GET['numeri'])) {
    $lunghMax = $lunghMax + count($numeri);
    array_push($selezionate, 'numeri');
}
if (isset($_GET['simboli'])) {
    $lunghMax = $lunghMax + count($simboli);
    array_push($selezionate, 'simboli');
}
$pass = [];
if (isset($_GET['ripetizione']) && $_GET['ripetizione'] == '1') {
    do {
        if (isset($_GET['lettere']) && $_GET['lettere'] == '1') {
            array_push($pass, $lettere[rand(0, count($lettere))]);
        }

        if (isset($_GET['simboli']) && $_GET['simboli'] == '3') {
            array_push($pass, $simboli[rand(0, count($simboli))]);
        }

        if (isset($_GET['numeri']) && $_GET['numeri'] == '2') {
            array_push($pass, $numeri[rand(0, count($numeri))]);
        }
    } while ($_GET['lunghezza'] > count($pass));



}
if (isset($_GET['ripetizione']) && $_GET['ripetizione'] == '0') {
    if ($_GET['lunghezza'] <= $lunghMax) {
        do {
            if (isset($_GET['lettere']) && $_GET['lettere'] == '1') {
                $tempCarattere = $lettere[rand(0, count($lettere))];
                if (!in_array($tempCarattere, $pass)) {
                    array_push($pass, $tempCarattere);
                }
            }

            if (isset($_GET['simboli']) && $_GET['simboli'] == '3') {
                $tempCarattere = $simboli[rand(0, count($simboli))];
                if (!in_array($tempCarattere, $pass)) {
                    array_push($pass, $tempCarattere);
                }
            }

            if (isset($_GET['numeri']) && $_GET['numeri'] == '2') {
                $tempCarattere = $numeri[rand(0, count($numeri))];
                if (!in_array($tempCarattere, $pass)) {
                    array_push($pass, $tempCarattere);
                }
            }
        } while ($_GET['lunghezza'] > count($pass));

    } else {
        $opzioni = implode(" e ", $selezionate);
        $error = 'se non si vuole ripere carattere la lunghezza massima è di: ' . $lunghMax . ' caratteri per ' . $opzioni;
        array_push($pass, $error);
    }

}
/*
if(in_array($valore, $array))
-
-
-
rand(10,100)
-
-
-
https://www.mrw.it/php/esiste-funzione-array-length-php_8666.html#:~:text=Per%20conoscere%20la%20dimensione%20di,count(%24miaarray)%3B
count()
-
-
-
array_push($miaarray, 'topolino');
-
-
-
// Declare an array 
$arr = array("Welcome","to", "GeeksforGeeks", 
"A", "Computer","Science","Portal");  
// Converting array elements into
// strings using implode function
echo implode(" ",$arr);
*/
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="text-capitalize">strong password generator</h1>
        <h2>Genera una password sicura</h2>
        <h5>
            <?php echo implode(" ", $pass); ?>
        </h5>
        <div class="p-4">
            <div class="row">
                <div class="col-6">
                    <div class="p-4">
                        <h5 class="text-capitalize">lunghezza password</h5>
                    </div>
                    <div class="p-4">
                        <h5 class="text-capitalize">consenti ripetizioni</h5>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        <form action="index.php">
                            <div class="mb-3 mx-4">
                                <input type="number" class="form-control" id="exampleFormControlInput1" name="lunghezza"
                                    value="">
                            </div>
                            <div class="p-4">
                                <div>
                                    <input class="form-check-input me-1" type="radio" name="ripetizione" value="1"
                                        id="firstRadio" checked>
                                    <label class="form-check-label text-capitalize" for="firstRadio">si</label>
                                </div>
                                <div>
                                    <input class="form-check-input me-1" type="radio" name="ripetizione" value="0"
                                        id="secondRadio">
                                    <label class="form-check-label text-capitalize" for="firstRadio">no</label>
                                </div>

                            </div>

                            <div class="p-4">
                                <div>
                                    <input class="form-check-input me-1" type="checkbox" name="lettere" value="1"
                                        id="lettere" checked>
                                    <label class="form-check-label text-capitalize" for="lettere">lettere</label>
                                </div>
                                <div>
                                    <input class="form-check-input me-1" type="checkbox" name="numeri" value="2"
                                        id="numeri">
                                    <label class="form-check-label text-capitalize" for="numeri">numeri</label>
                                </div>
                                <div>
                                    <input class="form-check-input me-1" type="checkbox" name="simboli" value="3"
                                        id="simboli">
                                    <label class="form-check-label text-capitalize" for="simboli">simboli</label>
                                </div>



                            </div>
                            <div class="col-12">
                                <div class="p-4">
                                    <button type="submit" class="btn btn-primary mb-3 text-capitalize">invia</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
</body>

</html>