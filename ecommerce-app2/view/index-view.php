<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<main>
    <h1>Site de vente de planche a voile</h1>

    <?php if ($message){ ?>
    <h2> <?php echo $message; ?> </h2>

    <?php } ?>



    <form method="post">
        <label>Nom et Prénom :</label>
        <input type="text" name="customerName" required>
        <button type="submit">Envoyer la commande</button>
    </form>

</main>

</body>
</html>
