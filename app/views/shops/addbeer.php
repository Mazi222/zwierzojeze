<?php require APPROOT . '/views/inc/header.php'; ?>
<h2>Dodaj piwo do sklepu <?php echo $_GET['shopaddress'] ?></h2>

<h3>Wybierz piwo z listy:</h3>
<form action="addBeer" method = "POST">


        <select name="beer"

        <?php foreach ($data['beers'] as $beer): ?>
            <option value = "<?php echo $beer->nazwaPiwa; ?>"><?php echo $beer->nazwaPiwa; ?></option>

        <?php endforeach; ?>

        </select>
        <input type="hidden" name="type" value="0">
        <input type="submit" value = "Wyślij">

</form>


<h3>Lub dodaj nowe:</h3>

<form action="addBeer" method = "POST">


    Piwo: <input type="text" name="beer">
    Styl: <select name="style"

    <?php foreach ($data['beers'] as $beer): ?>
        <option value = "<?php echo $beer->nazwaStylu; ?>"><?php echo $beer->nazwaStylu; ?></option>

    <?php endforeach; ?>

    </select>
    <input type="hidden" name="type" value="1">
    <input type="submit" value = "Wyślij">

</form>


<?php require APPROOT . '/views/inc/footer.php'; ?>
