<?php $value = $_SERVER['REQUEST_URI'];
setcookie("RecordSet", $value,  strtotime( '+30 days' ));
?>
<html>
<?php include("components/layout/header.php"); ?>
<body>
<div class="body_wrap">
    <?php include("components/layout/navbar.php"); ?>
    <div class="Right_Side">
        <?php include("components/adv_results_sec.php"); ?>
    </div>
</div>
</body>
<script>
  <?php include("javascript/img_change.js");?>
</script>
<?php include("components/layout/footer.php"); ?>
</html>
