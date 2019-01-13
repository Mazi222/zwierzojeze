<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('vote_added'); ?>
<h2 class="gs_header"><?php echo $data['shop']-> ulicaNrLokalu; ?></h2>
<h3 class="gs_piwoHeader">Dostępne piwa:</h3>
<ul class="gs_list">
<?php foreach ($data['beers'] as $beer): ?>
<li>
    <div class="gs_beer">
   <h4><?php echo $beer->nazwaPiwa; ?> -
       <?php echo $beer->nazwaStylu; ?> - alk.
       <?php echo $beer->zawartoscAlkoholu; ?> %
       <a href="<?php echo URLROOT;?>/rates/rateYes?beer=<?php echo $beer->nazwaPiwa; ?>&shop=<?php echo $data['shop']->idSklepu;?>"><button type="button" class="btn btn-success" id="gs_buttonp">+</button></a>
       <a href="<?php echo URLROOT;?>/rates/rateNo?beer=<?php echo $beer->nazwaPiwa; ?>&shop=<?php echo $data['shop']->idSklepu;?>"><button type="button" class="btn btn-danger" id="gs_buttonm">-</button></a>

   </h4>
    </div>
</li>

<?php endforeach; ?>
</ul>
<a href="<?php echo URLROOT;?>/rates/addBeer?shop=<?php echo $data['shop']->idSklepu;?>&shopaddress=<?php echo $data['shop']-> ulicaNrLokalu;?>"><button type="button" class="btn btn-dark">Dodaj piwo do sklepu</button></a>

<?php require APPROOT . '/views/inc/footer.php'; ?>
