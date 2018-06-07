<div class="inner_right">
<h1> Image-Free Search</h1>
<p>This search produces results in an image free format, ideal for printing. </p>
<form id="image_free_form" action="image_free_query.php" method="post">
  <h3 class="search_h3"> Search by: </h3>
  <select name="column" id="column_select">
    <?php include("components/dbconnect.php"); ?>
   <?php include("components/search_components/load_columns.php") ?>
  </select>
<input name="search" class="search_bar" type="search" value=""></input>
<select name="amount" id="amount" class="filter_list" >
  <option value="1000">Maximum amount of records </option>
  <option value="10"> 10 </option>
  <option value="50"> 50 </option>
  <option value="100"> 100 </option>
  <option value="200"> 200 </option>
  <option value="500"> 500 </option>
  <option value="1000"> 1000 </option>
 </select>
<button class="submit_button" Adv_search type="submit"> Search </button>




</form>
</div>
