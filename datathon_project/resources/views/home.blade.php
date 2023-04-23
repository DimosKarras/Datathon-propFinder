<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            font-size: 17px;
        }

        #myVideo {
            right: 0;
            bottom: 0;
            height: auto;
            width: 100%;
        }

        .content {
            position: absolute;
            background: rgba(0, 0, 0, 0.5);
            color: #f1f1f1;
            width: 100%;
            padding: 40px;
        }

        #myBtn {
            width: 200px;
            font-size: 18px;
            padding: 10px;
            border: none;
            background: #000;
            color: #fff;
            cursor: pointer;
        }

        #myBtn:hover {
            background: #ddd;
            color: black;
        }


        .center {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

    </style>
</head>
<body>

<div class="row">
    <div class="content">
        <h1><strong><i><text style="color: #1a8828;">prop</text>Finder</i></strong> - Οδηγός Επιλογής Περιοχής κατοικίας</h1>
        <p>Eφαρμογή web, η οποία δείχνει πόσο βιώσιμη είναι μία περιοχή μιας πόλης μέσω ανοιχτών δεδομένων.</p>
    </div>
    <video autoplay muted loop id="myVideo">

        <source src="{{url('video1.mp4')}}" type="video/mp4">
        Your browser does not support HTML5 video.
    </video>

{{--    content position-absolute bottom-0 start-0 end-0 mb-3 d-flex justify-content-center align-items-center--}}

</div>

<div class="container">
    <div class="row">
        <div class="col-lg p-3 m-4 myBox">
            <div class="row">
                <h4>Τι είναι το propFinder;</h4>
                <hr>
                <p>
                    Το propFinder είναι μία εξειδικευμένη εφαρμογή, που συνδυάζει το real estate με την αναβάθμιση της ποιότητας ζωής των ατόμων, βάσει εξειδικευμένων επιλεγμένων κριτηρίων του χρήστη, που βασίζονται σε ανοιχτά δεδομένα.  Μετά από λίγα clicks, μπορείς να καταλήξεις στην αγορά ή ενοικίαση της επόμενης κατοικίας σου!
                </p>
            </div>
        </div>
        <div class="col-lg p-3 m-4 myBox">
            <div class="row">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg m-4 myBox">
            <div class="row">
            </div>
        </div>
        <div class="col-lg m-4 myBox">
            <div class="row">
                <h4>Γιατί να το χρησιμοποιήσω και τί είναι αυτό που το ξεχωρίζει;</h4>
                <hr>
                <p>
                    Παρέχει πληθώρα δεικτών αξιολόγησης και αφήνει στον ενδιαφερόμενο την επιλογή των σπουδαιότερων για τον ίδιο, ενώ παράλληλα η εφαρμογή, ανάλογα με τη σειρά επιλογής των δεικτών κατανέμει και την ανάλογη βαρύτητα στον τελικό δείκτη βιωσιμότητας της επιλεγμένης περιοχής. Καθίσταται, με τον τρόπο αυτό, μία εξατομικευμένη εφαρμογή. Παράλληλα συμβάλλει στον μετασχηματισμό των επιχειρήσεων του κτηματομεσιτικού κλάδου, με την ψηφιακή έκφραση απαραίτητων δεδομένων για την σφαιρική και ανταγωνιστική παροχή της υπηρεσίας τους.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg m-4 myBox">
            <div class="row">
                <h4>Μεταβλητές και ανοιχτά δεδομένα.</h4>
                <hr>
                <p>
                    Τα δεδομένα είναι το σύγχρονο νόμισμα της αγοράς και γύρω μας υπάρχουν άπειρες πληροφορίες, σχετικές με τα πάντα. Οι δυνατότητες της τεχνολογίας σε συνδυασμό με τη συλλογή πραγματικών στοιχείων για τους τομείς ενδιαφέροντος, παράγουν μεγάλη αξία για την προσωπική και επενδυτική ανάπτυξη των ατόμων και επιχειρήσεων.
                </p>
            </div>
        </div>
        <div class="col-lg m-4 myBox">
            <div class="row">
            </div>
        </div>
    </div>
</div>

<div class="row text-center mt-5">
    <h2>Βρες κάτι που μετράει!</h2><br>
    <p>Εσύ διαλέγεις που θα μείνεις. Κάνε τη ζωή σου ευκολότερη με το <strong><i><text style="color: #1a8828;">prop</text>Finder</i></strong></p> <small><b>#simpleyetpowerful</b></small>
</div>
<div class="center">
    <button class="btn btn-primary btn-lg" onclick = "window.location.href='home';">Πήγαινε στην εφαρμογή</button>
</div>


<script>

</script>

</body>
</html>
