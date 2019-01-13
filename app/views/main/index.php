<?php require APPROOT . '/views/inc/header.php'; ?>
    <div id = mainDiv>
        <h2 class = "find">Find your beer</h2>
        <div id = "form">
            <form method="POST" action="<?php echo URLROOT; ?>/main">
            Address:
            <br/>
            <input type="text" name = "adres"/>
            <br/>
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
<?php require APPROOT . '/views/inc/footer.php'; ?>