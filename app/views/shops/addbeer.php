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
        <input type="hidden" name="shop" value="<?php echo $_GET['shop']; ?>">
        <input class = "submit" type = "submit", value = "Add"  />


</form>


<h3>Lub dodaj nowe:</h3>

<form action="addBeer" method = "POST">


    Piwo: <input type="text" name="beer">
    Styl: <br>   <select name="style"

    <?php foreach ($data['beers'] as $beer): ?>
        <option value = "<?php echo $beer->nazwaStylu; ?>"><?php echo $beer->nazwaStylu; ?></option>

    <?php endforeach; ?>

    </select><br>
    Zawartość alkoholu <input type="number" step="0.01" name="alc">
    <input type="hidden" name="type" value="1">
    <input type="hidden" name="shop" value="<?php echo $_GET['shop']; ?>">
    <input class = "submit" type = "submit", value = "Add"  />

</form>


<?php require APPROOT . '/views/inc/footer.php'; ?>
