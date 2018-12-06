<?php include('components/search_components/advanced_search_query.php'); ?>
<h1> Advanced Search Results </h1>
<span id=span1></span>
<span> Your search returned <?php echo $a; ?> records </span>
<br>
<span>Click <a href="advanced_search.php" style="color:black;"  title="Go to advanced search">here</a> to perform another search.</span>
<div class=Search_Result id=Search_Result>
    <?php echo $tablecontent; ?>
</div>
