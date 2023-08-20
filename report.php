<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aliens Abducted Me - Report an Abduction</title>
</head>
<body>
    <h1>Abduction - Form -Submit Confirmation</h1>
    <?php
    /*
    ***This handles getting form data
    ***Then Storing them in a variable
    */
    $name = $_POST ['firstname'] . ' ' . $_POST['lastname'];
    $first_name = $_POST ['firstname'];
    $last_name = $_POST['lastname'];
    $how_many = $_POST['howmany'];
    $what_they_did = $_POST['whattheydotoyou'];
    $other = $_POST['otherthing'];
    $when_it_happened = $_POST["whenithappened"];
    $how_long = $_POST["howlong"];
    $your_email = $_POST["youremail"];
    $describe_them = $_POST["describethem"];
    $fangspotted = $_POST["fangotted"];

    /*
    ***This handles storing  of the data to MYSQL dataabse
    ***Here we handle db connection, querying and closure
    */
    $dbc = mysqli_connect('localhost', 'root', '', 'aliens_abduction')
        or die('Error connecting to Mysql database');
    $query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened," . 
        "how_long, how_many, alien_description, what_they_dd, fang_spotted, other, email)" . 
        "VALUES ('$first_name', '$last_name','$when_it_happened','$how_long','$how_many'," . 
        "'$describe_them','$what_they_did','$fangspotted','$other','$your_email')";
    $result = mysqli_query($dbc, $query)
        or die('Error adding data or querying the database');
    mysqli_close($dbc);

    /*
    ***This handles emailing the data to admin email
    ***The data are well formatted as text data not html
    */
    $to = 'nzekwesammy@gmail.com'; 
    $subject = 'Alien Abduction Report'; 
    $msg = "$name was abducted On $when_it_happened and were gone for $how_long.\n" . 
        "Number Of Aliens: $how_many.\n" . 
        "Alien Description: $describe_them. \n" . 
        "What did they do to you? $what_they_did. \n" . 
        "Fang Spotted: $fangspotted. \n" . 
        "Other Comments: $other. \n";
    mail($to, $subject, $msg, 'from: ' . $your_email);
    
    /*
    ***This handles displaying the submission confirmation page
    ***It proves that form is successfully submitted
    */
    echo 'Thanks For submitting the Form.<br>';
    echo 'You were abducted on ' . $when_it_happened;
    echo ' and were gone for ' . $how_long . '<br>';
    echo 'Describe them briefly: ' . $describe_them . '<br>';
    echo 'How Many are the Aliens: ' . $how_many . '<br>';
    echo 'Was fang Spotted? ' . $fangspotted . '<br>';
    echo 'Your Email Adress is ' . $your_email . '<br>';
    echo 'Other Comments: ' . $other . '<br>';
    echo 'Gracias to have you here,' . $name . '<br>';

    ?>
</body>
</html>