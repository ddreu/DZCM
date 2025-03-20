<?php
include 'includes/header.php';
include 'includes/menuBar.php';
include 'includes/conn.php';
?>
<main id="main" class="main">
  <section class="section">
    <div class="wrapper">
      <section class="users">
        <header
          <div class="content">
          <?php
          $date = $datetime->format('Y-m-d H:i');
          $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE userid = {$_SESSION['login_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>

          <div class="details">
            <span><?php echo $row['fullname'] ?></span>
            <p>
              <?php
              if ($row['status'] <= $date) {
                echo ' <i class="fas fa-circle text-secodary"></i> Offline';
              } else {
                echo ' <i class="fas fa-circle text-success"></i> Online';
              }
              ?></p>
          </div>
          <div class="float-end">
            <button type="button" class="btn btn-danger delete" value="<?= $_SESSION['login_id'] ?>">Delete All</button>
          </div>


        </header>
        <div class="search">
          <span class="text">Select an user to start chat</span>
          <input type="text" placeholder="Enter name to search...">
          <button><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">

        </div>
      </section>
    </div>
  </section>
</main>

<script src="chatJS/users.js"></script>

<script>
  $(".delete").click(function(e) {
    e.preventDefault()
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          type: "GET",
          url: "includes/deletemessage.php?session=" + $(this).val(),
          success: function(response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 'success') {
              Swal.fire("Success", res.message, "success").then(function() {
                window.location.reload();
              })
            } else {
              Swal.fire("Error", res.message, "error")
            }
          }
        })
      }
    })
  })
</script>
<?php
include 'includes/footer.php';
?>