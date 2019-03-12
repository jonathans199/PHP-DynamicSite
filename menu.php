<?php 
define("TITLE", "Menu | Franklin's Find Dining")
?>

<?php include('includes/header.php') ?>

  <div id="menu-items">
    <h1>Our Delicious Menu</h1>
    <p>Like our team, our menu Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus deserunt, ea debitis obcaecati in inventore ex dolor vitae? Esse delectus  <em>ipsam officia dolorem accusamus sunt eaque optio tenetur ex voluptatum? </em> </p>

    <hr>

    <ul>
      <?php foreach ($menuItems as $dish => $item) { ?>

        <li>
          <a href="dish.php?item=<?php echo $dish; ?>"> <!--Query string => creating an VARIABLE with every items KEY -->
            <?php echo $item[title]; ?> 
            <sup>$</sup> 
            
          </a>
          <?php echo $item[price]; ?>
        </li>
          
     <?php } ?> <!--closing the PHP -->
    </ul>

  </div>

<?php include('includes/footer.php') ?>