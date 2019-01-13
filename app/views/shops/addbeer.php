<?php require APPROOT . '/views/inc/header.php'; ?>
<div id = mainDivA>
    <h3>Dodaj piwo do sklepu: <?php echo $_GET['shopaddress'] ?></h3>
    <br/>
    <div class="chooseBeer">
        <h4>Wybierz piwo z listy:</h4> <br/>
        <form action="addBeer" method = "POST">
                <select id = "beerA" name="beer"
                <?php foreach ($data['beers'] as $beer): ?>
                    <option value = "<?php echo $beer->nazwaPiwa; ?>"><?php echo $beer->nazwaPiwa; ?></option>
                <?php endforeach; ?>
                </select>
                <input type="hidden" name="type" value="0">
                <input type="hidden" name="shop" value="<?php echo $_GET['shop']; ?>">
                <input id = "submitAdd" type = "submit" value = "Add" />
        </form>
    </div>

    <div class="addBeerA">
        <h4>Lub dodaj nowe:</h4>
        <form action="addBeer" method = "POST">
            Piwo: <input id = "textAdd" type="text" name="beer"> <br/>
            Zawartość alkoholu <input id = "textAdd" type="number" step="0.01" name="alc">
            Styl: <br/>
            <select name="style" id = "beerA" >
            <?php foreach ($data['beers'] as $beer): ?>
                <option value = "<?php echo $beer->nazwaStylu; ?>"><?php echo $beer->nazwaStylu; ?></option>
            <?php endforeach; ?>
            </select>
            <input type="hidden" name="type" value="1">
            <input type="hidden" name="shop" value="<?php echo $_GET['shop']; ?>">
            <input id = "submitAdd" type = "submit", value = "Add"  />
        </form>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
