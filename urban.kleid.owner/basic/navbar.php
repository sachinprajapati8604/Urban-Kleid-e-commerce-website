
  <?php
echo  '
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
<a class="navbar-brand mx-2" href="home.php">Admin Panel</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="send_news_letter.php">Send News Letter <span class="sr-only"></span></a>
    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Add Products
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="add_tshirt.php">T-shirts</a>
        <a class="dropdown-item" href="add_sweatshirts.php">Sweatshirts </a>
        <a class="dropdown-item" href="add_hoodies.php">Hoodies </a>

    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        View Products
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="view_tshirt.php">T-shirts</a>
        <a class="dropdown-item" href="view_sweatshirt.php">Sweatshirts </a>
        <a class="dropdown-item" href="view_hoodies.php">Hoodies </a>

    </li>
    <li class="nav-item">
      <a class="nav-link" href="view_orders.php">View Orders</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="user_data.php">User Data</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="upload_images.php">Upload Images</a>
</li>
    <li class="nav-item">
      <a class="nav-link" href="modify_index.php">Update Index Page</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="return_order_list.php">Returned Order </a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="update_tracking.php">Update Tracking Details </a>
</li>
    <li class="nav-item">
    <a class="nav-link" href="add_admin.php">Add Admin</a>
  </li>

  </ul>
</div>
</nav>';
?>