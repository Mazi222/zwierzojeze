<?php require APPROOT . '/views/inc/header.php'; ?>

<div id = mainDiv>
    <?php  $xml = simplexml_load_file('data.xml');
    $adres0 = ($xml->marker[0]['adres']);
    $adres1 = ($xml->marker[1]['adres']);
    $adres2 = ($xml->marker[2]['adres']);
    $adres3 = ($xml->marker[3]['adres']);
    $adres4 = ($xml->marker[4]['adres']);
    $adres5 = ($xml->marker[5]['adres']);
    $adres6 = ($xml->marker[6]['adres']);
    $adres7 = ($xml->marker[7]['adres']);
    $adres8 = ($xml->marker[8]['adres']);
    $adres9 = ($xml->marker[9]['adres']);
    $url0 = ($xml->marker[0]['webpage']);
    $url1 = ($xml->marker[1]['webpage']);
    $url2 = ($xml->marker[2]['webpage']);
    $url3 = ($xml->marker[3]['webpage']);
    $url4 = ($xml->marker[4]['webpage']);
    $url5 = ($xml->marker[5]['webpage']);
    $url6 = ($xml->marker[6]['webpage']);
    $url7 = ($xml->marker[7]['webpage']);
    $url8 = ($xml->marker[8]['webpage']);
    $url9 = ($xml->marker[9]['webpage']);
    ?>
    <div id="map">
        <script>

            function initMap() {
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                });
                var address0 = "<?php Print($adres0); ?>";
                var address1 = "<?php Print($adres1); ?>";
                var address2 = "<?php Print($adres2); ?>";
                var address3 = "<?php Print($adres3); ?>";
                var address4 = "<?php Print($adres4); ?>";
                var address5 = "<?php Print($adres5); ?>";
                var address6 = "<?php Print($adres6); ?>";
                var address7 = "<?php Print($adres7); ?>";
                var address8 = "<?php Print($adres8); ?>";
                var address9 = "<?php Print($adres9); ?>";
                var url0 = "<?php Print($url0); ?>";
                var url1 = "<?php Print($url1); ?>";
                var url2 = "<?php Print($url2); ?>";
                var url3 = "<?php Print($url3); ?>";
                var url4 = "<?php Print($url4); ?>";
                var url5 = "<?php Print($url5); ?>";
                var url6 = "<?php Print($url6); ?>";
                var url7 = "<?php Print($url7); ?>";
                var url8 = "<?php Print($url8); ?>";
                var url9 = "<?php Print($url9); ?>";
                actualLoaction(map,address0,url0);
                test(map,address1,url1);
                test(map,address2,url2);
                test(map,address3,url3);
                test(map,address4,url4);
                test(map,address5,url5);
                test(map,address6,url6);
                test(map,address7,url7);
                test(map,address8,url8);
                test(map,address9,url9);


            }
            function actualLoaction(map, address, url) {
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({'address': address}, function (results, status) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location,
                        icon: 'blackMarker.png'
                    });
                    var infowindow =  new google.maps.InfoWindow({
                        content: "You are here",
                        map: map,
                    });
                    marker.addListener('click', function () {
                        window.location.replace(url);
                    });
                    marker.addListener('mouseover', function() {
                        infowindow.open(map, this);
                    });

                    marker.addListener('mouseout', function() {
                        infowindow.close();
                    });
                });
            }
            function test(map, address, url) {
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({'address': address}, function (results, status) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                    var infowindow =  new google.maps.InfoWindow({
                        content: address,
                        map: map,
                    });
                    marker.addListener('click', function () {
                        window.location.replace(url);
                    });
                    marker.addListener('mouseover', function() {
                        infowindow.open(map, this);
                    });

                    marker.addListener('mouseout', function() {
                        infowindow.close();
                    });
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHrs8loLJHTSomw3Cj3XecWBeAB5qvdpU&callback=initMap">
        </script>
    </div>
    <div id = "beers">
        <h2 class = "find"><?php echo $_POST['type']; ?>    </h2>
        <h3> Where to find near <?php echo $_POST['adres']; ?></h3>
        <ul class = "beerlist">
        <?php foreach ($data['shops'] as $shop): ?>
            <a class ="beerlist" href="shops/getshop/<?php echo $shop->idSklepu; ?>"> <li> <?php echo $shop->przedsiebiorca.' - '; echo $shop->ulicaNrLokalu.' ';  echo $shop ->dist.'km'?></li></a>
        <?php endforeach; ?>
        </ul>

    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
