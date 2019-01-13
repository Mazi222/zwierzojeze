<html>
<head>
	<title>Custom Markers</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta charset="utf-8">
	<link rel="Stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
      <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/main/about">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <?php if(isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/changepassword">Change Password</a>
            </li>
              <li class="nav-item">
                  <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
              </li>
          <?php else : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Login</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
<div class="container">
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
        <div id="map" >
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
                test(map,address0,url0);
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
            function test(map, address, url) {
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({'address': address}, function (results, status) {
                    map.setCenter(results[0].geometry.location);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: results[0].geometry.location
                    });
                    marker.addListener('click', function () {
                        window.location.replace(url);
                    });
                });
            }
        </script>
        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBHrs8loLJHTSomw3Cj3XecWBeAB5qvdpU&callback=initMap">
        </script>
        </div>
        <div id = "form">
            <form method="get">
                Address:
                <br/>
                <input class = "address" type="text" width="79%"/>
                <select class = "distance" name="distance" >
                    <option value="500">500</option>
                    <option value="1000">1000</option>
                    <option value="2000">2000</option>
                    <option value="5000+">5000+</option>
                </select>
                <input class = "submit" type = "submit", value = "Search"  />
            </form>
            <form method="get">
                Type:
                <br/>
                <select name="type" >
                    <option>Anglo-American Ales</option>
                    <option>Lagers</option>
                    <option>Belgian-Style Ales</option>
                    <option>Stout and Porter</option>
                    <option>Wheat Beer</option>
                    <option>Sour Beer</option>
                    <option>Other Styles</option>
                    <option>Cider, Mead, Sake</option>
                </select>
                <input class = "submit" type = "submit", value = "Search"  />
            </form>
        </div>
    </div>
</div>
</body>

</html>
