<?php 
  define("TITLE", "Team | Franklin's fine dining");

  include('includes/header.php');
?>

<div class="cf" id="team-members">
  <h1> Our team at Franklin's</h1>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit dolorum perspiciatis incidunt, quibusdam quis provident in nihil nostrum illo tenetur quas, tempore vel consequatur excepturi cumque itaque commodi esse. Iure?<strong>the best food you've ever had </strong></p>

  <hr>

  <?php foreach ($teamMembers as $member){
  ?>
    <div class="member">
      <img src="assets/img/<?php echo $member[img]; ?>" alt="<?php echo $member[name]; ?>">
      <h2><?php echo $member[name]; ?></h2>
      <p><?php echo $member[bio]; ?></p>
    </div>
  <?php 
        }
  ?>

</div>

<?php include('includes/footer.php');?>