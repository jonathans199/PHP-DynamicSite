<?php 
define("TITLE", "Menu Item | Franklins Fine Dining");

include('includes/header.php');


//strips bad characters to prevent php injections
function strip_bad_chars($input) {
  $output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input);
  return $output;
}


if (isset($_GET['item'])) {
  $menuItem = strip_bad_chars($_GET['item']); //applies the strip bad chars if to the GET

  $dish = $menuItems[$menuItem];
};

  

function suggestedTip($price, $tip) //calculate a suggested Tip
{
  $totalTip = $price * $tip;
  echo money_format('%.2n', $totalTip);
}

?>

<hr>

<div id="dish">
  <h1><?php echo $dish[title]; ?>
    <span class="price"> 
      <sup>$</sup>
      <?php echo $dish[price]; ?>
    </span>
    
  </h1>
    <p><?php echo $dish[blurb]; ?></p>
    <br>
    <p>
      <strong>Suggested Beverage: 
        <?php echo $dish[drink]; ?>
      </strong>
    </p>
    <p>
      <em>Suggested Tip: <sup> $</sup><?php suggestedTip($dish[price], 0.20); ?></em>
    </p>
</div>

<hr>
<a href="menu.php" class="button previous">&laquo; Back to Menu</a>

<?php include('includes/footer.php'); ?>