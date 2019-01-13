<?php require APPROOT . '/views/inc/header.php'; ?>
<h2>Ulubione sklepy:</h2>
<?php foreach ($data['fav_shops'] as $shop): ?>
    <ul class="beerlist">
    <li><a class ="beerlist" href="../shops/getshop/<?php echo $shop->idSklepu; ?>"> <?php echo $shop->ulicaNrLokalu.' - '.$shop->przedsiebiorca; ?></a>
        <a href="delete/<?php echo $shop->idSklepu; ?>">Usuń</a></li>
    </ul>
<?php endforeach; ?>
<h2>Dodaj nowy sklep do ulubionych:</h2>
<form action="mypage" method="POST">
    <select name="shop">
        <?php foreach ($data['shops'] as $shop): ?>
            <option value="<?php echo $shop->idSklepu; ?>"> <?php echo $shop->ulicaNrLokalu.' - '.$shop->przedsiebiorca; ?> </option>
        <?php endforeach; ?>
    </select>
    <input type="hidden" name = "type" value = "1">
    <input type="submit" value = "Dodaj">
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
