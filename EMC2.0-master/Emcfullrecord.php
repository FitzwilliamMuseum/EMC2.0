<html>
<title>EMC Full Record </title>
<?php include("components/layout/header.php") ?>
<body>
<div class="body_wrap">
    <?php include("components/layout/navbar.php") ?>
    <div class=Right_Side>
        <div id=Record_Side>
            <?php require('./fullrecordphp.php'); ?>
            <h1 class="contenth1"> Full Record of <?php echo $result['objNum'] ?></h1>

            <div class="content_wrap">
                <div class="list_wrap">
                    <div class="list_content"> EMC number : <?php echo $result['objNum'] ?> </div>
                    <div class="list_content"> State: <?php echo $result['StateName'] ?></div>
                    <div class="list_content"> Ruler: <?php echo $result['RulerName'] ?></div>
                    <div class="list_content"> Type: <?php echo $result['TypeName'] ?> </div>
                    <div class="list_content"> Mint: <?php echo $result['MintName'] ?></div>
                    <div class="list_content"> Mint name on coin: <?php echo $result['MintSig'] ?> </div>
                    <div class="list_content"> Moneyer: <?php echo $result['MoneyerLemma'] ?></div>
                    <div class="list_content"> Moneyer name on coin: <?php echo $result['MoneyerName'] ?></div>
                    <div class="list_content"> Weight: <?php echo $result['Weight'] ?>g</div>
                    <div class="list_content"> Preservation: <?php echo $result['Preservation'] ?> </div>
                    <div class="list_content"> Findspot: <?php echo $result['FindspotName'] ?> </div>
                    <div class="list_content"> Comment: <?php echo $result['Comment'] ?> </div>
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
            <div class="record_nav">
              <div class="prevrecord">
               <a id="leftbutton" href=""><span class="prevrecspan">← Previous Record</span></a>

              </div>
              <div class="nextrecord">
               <a style="color:black" id="rightbutton" href=""><span class="prevrecspan">Next Record →</span></a>
             </div>
            </div>
            <a style="color: black; margin-left: 2%; font-family: 'Open Sans', sans-serif;"href=<?php echo $_COOKIE["RecordSet"]; ?>>Your previous results </a>
        </div>
    </div>
</div>
</body>
<?php include("components/layout/footer.php") ?>
<script src="javascript/coinnav.js"></script>
</html>
