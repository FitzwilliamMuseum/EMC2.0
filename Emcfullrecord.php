<html>
<?php include("components/layout/header.php") ?>
<body>
<div class="body_wrap">
    <?php include("components/layout/navbar.php") ?>
    <div class=Right_Side>
        <div id=Record_Side>
            <?php require('./fullrecordphp.php'); ?>
            <h1 class="contenth1"> Full Record of <?php echo $result['CoinID'] ?></h1>

            <div class="content_wrap">
                <div class="list_wrap">
                    <div class="list_content"> EMC number : <?php echo $result['CoinID'] ?> </div>
                    <div class="list_content"> State: <?php echo $result['StateName'] ?></div>
                    <div class="list_content"> Ruler: <?php echo $result['RulerName'] ?></div>
                    <div class="list_content"> Period: <?php echo $result['Period'] ?> </div>
                    <div class="list_content"> Comment: <?php echo $result['Comment'] ?></div>
                    <div class="list_content"> Type: <?php echo $result['Denomination'] ?></div>
                    <div class="list_content"> Mint: <?php echo $result['MintName'] ?></div>
                    <div class="list_content"> Moneyer:</div>
                    <div class="list_content"> Era: <?php echo $result['Era'] ?></div>
                    <div class="list_content"> Weight: <?php echo $result['Weight'] ?>g</div>
                    <div class="list_content"> Findspot: <?php echo $result['FindspotName'] ?> </div>
                    <div class="list_content"> Source: <?php echo $result['Source'] ?> </div>
                    <div class="list_content"> Image source: <?php echo $result['ImageSource'] ?> </div>
                </div>
                <div class="img_wrap">
                    <div class="img_content">Obverse</div>
                    <div id="fullrecimg"><img class=coinimg
                                              src='http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/<?php echo str_replace('.', '_', $result['objNum']) . "obv.jpg" ?>'
                                              onError="imgError(this);"/></div>
                    <div class="img_content">Reverse</div>
                    <div id="fullrecimg"><img class=coinimg
                                              src='http://www-img.fitzmuseum.cam.ac.uk/img/emc/300jpg/<?php echo str_replace('.', '_', $result['objNum']) . "rev.jpg" ?>'
                                              onError="imgError(this);"/></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include("components/layout/footer.php") ?>
</html>
