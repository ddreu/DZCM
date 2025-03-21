<!-- <style>
  .section {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100%;
  }

  .wrapper {
    background-color: #fff;
    width: 100%;
    height: 100%;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .users {
    padding: 20px;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 15px;
    border-bottom: 1px solid #ddd;
  }

  .content {
    display: flex;
    align-items: center;
  }

  .details span {
    font-size: 16px;
    font-weight: bold;
  }

  .details p {
    margin: 2px 0;
    font-size: 14px;
    color: #666;
    display: flex;
    align-items: center;
  }

  .details i {
    margin-right: 5px;
  }

  .text-success {
    color: #28a745;
  }

  .text-secondary {
    color: #6c757d;
  }

  .btn-danger {
    background-color: #dc3545;
    color: #fff;
    padding: 6px 12px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.2s ease;
  }

  .btn-danger:hover {
    background-color: #c82333;
  }

  .search {
    margin-top: 15px;
    display: flex;
    align-items: center;
    background-color: #f1f1f1;
    padding: 8px;
    border-radius: 20px;
  }

  .search input {
    flex: 1;
    padding: 8px;
    border: none;
    outline: none;
    background-color: transparent;
    font-size: 14px;
  }

  .search button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 6px 12px;
    border-radius: 20px;
    cursor: pointer;
    transition: background 0.2s ease;
  }

  .search button:hover {
    background-color: #0056b3;
  }

  .search i {
    font-size: 16px;
  }

  .users-list {
    margin-top: 10px;
    max-height: 300px;
    overflow-y: auto;
  }

  .users-list::-webkit-scrollbar {
    width: 5px;
  }

  .users-list::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 5px;
  }

  .users-list::-webkit-scrollbar-track {
    background-color: #f1f1f1;
  }

  .user-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #eee;
    cursor: pointer;
    transition: background 0.2s ease;
  }

  .user-item:hover {
    background-color: #f9f9f9;
  }

  .user-item img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    margin-right: 10px;
  }

  .user-item .details {
    flex: 1;
  }

  .user-item .details span {
    font-size: 16px;
    font-weight: bold;
  }

  .user-item .details p {
    font-size: 14px;
    color: #666;
  }

  @media (max-width: 500px) {
    .wrapper {
      width: 100%;
      border-radius: 0;
    }
  }
</style> -->

<section class="section">
  <div class="wrapper">
    <section class="users">
      <header class="d-flex justify-content-between align-items-center">
        <div class="content">
          <?php
          require_once 'chat-admin/php/connection.php';
          $date = $datetime->format('Y-m-d H:i');
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          }
          ?>

          <div class="details">
            <span><?php echo $row['username'] ?></span>
            <p>
              <?php
              if ($row['status'] <= $date) {
                echo ' <i class="fas fa-circle text-secondary"></i> Offline';
              } else {
                echo ' <i class="fas fa-circle text-success"></i> Online';
              }

              ?>
            </p>
          </div>
        </div>

        <button type="button" class="btn btn-danger delete" value="<?= $_SESSION['user_id'] ?>">Delete All</button>
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

<script src="chat-admin/chatJS/users.js"></script>

<script>
  /* updates the session */

  var session = function() {
    var action = 'status';
    $.ajax({
      url: "includes/session.php",
      method: "POST",
      data: {
        action: action
      }
    });
  }
  setInterval(session, 1000);
  // $(".delete").click(function(e) {
  //   e.preventDefault()
  //   Swal.fire({
  //     title: "Are you sure?",
  //     text: "You won't be able to revert this!",
  //     icon: "warning",
  //     showCancelButton: true,
  //     confirmButtonColor: "#3085d6",
  //     cancelButtonColor: "#d33",
  //     confirmButtonText: "Yes, delete it!"
  //   }).then((result) => {
  //     if (result.isConfirmed) {
  //       $.ajax({
  //         type: "GET",
  //         url: "chat-admin/php/deletemessage.php?session=" + $(this).val(),
  //         success: function(response) {
  //           var res = jQuery.parseJSON(response);
  //           if (res.status == 'success') {
  //             Swal.fire("Success", res.message, "success").then(function() {
  //               window.location.reload();
  //             })
  //           } else {
  //             Swal.fire("Error", res.message, "error")
  //           }
  //         }
  //       })
  //     }
  //   })
  // })
</script>