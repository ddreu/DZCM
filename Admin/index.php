<?php
session_start();
require_once 'includes/conn.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZCM | Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
    <link rel="stylesheet" href="assets/css/chat.css">
</head>

<body>

    <div class="dashboard-container">
        <?php include 'includes/sidebar.php'; ?>


        <main class="main-content">
            <?php

            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            $allowed_pages = ['dashboard', 'chat', 'messages', 'services', 'settings', 'company-profile', 'service-features', 'clients', 'email', 'users', 'hardware', 'settings', 'user-settings'];

            if (in_array($page, $allowed_pages) && file_exists("pages/$page.php")) {
                include("pages/$page.php");
            } else {
                echo "<h2>Page not found!</h2>";
            }

            ?>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/hardware.js"></script>
    <script src="assets/js/company-profile.js"></script>
    <script src="assets/js/client.js"></script>
    <script src="assets/js/service-feature.js"></script>
    <script src="assets/js/services.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/users.js"></script>
    <script src="assets/js/user-settings.js"></script>

    <?php if (!empty($_SESSION['login_success'])): ?>
        <script>
            Swal.fire({
                toast: true,
                position: "top",
                icon: "success",
                title: "Welcome!",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                showClass: {
                    popup: "animate__animated animate__fadeInUp animate__faster "
                },
                hideClass: {
                    popup: "animate__animated animate__fadeOutDown animate__faster "
                }
            });
        </script>
    <?php endif; ?>
    <?php unset($_SESSION['login_success']); ?>



    </script>
    <script>
        // delete message        

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
                        url: "chat-admin/php/deletemessage.php?session=" + $(this).val(),
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
    </script>
    <script>
        var session = function() {

            $.ajax({
                type: "GET",
                url: "chat-admin/php/session.php?userid=<?php echo $_GET['user_id'] ?>",
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 404) {
                        $('#test').addClass('fas fa-circle text-success');
                        $('#test').html('Active now');
                    } else {
                        $('#test').addClass('fas fa-circle');
                        $('#test').html('Offline');
                    }
                }
            })
        }
        setInterval(session, 1000);


        //if chat is opened 
        var openchat = function() {

            $.ajax({
                type: "GET",
                url: "chat-admin/php/open-message.php?userid=<?php echo $user_id ?>",
                success: function(response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 100) {

                    } else {

                    }
                }
            })
        }
        setInterval(openchat, 1000);
    </script>

    <script>
        //Delete messages
        $('.delete').click(function(e) {
            e.preventDefault();
            var del = $(this).data('id');
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
                        type: 'GET',
                        url: 'chat-admin/php/delete-message.php',
                        data: {
                            del: del
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === "success") {
                                Swal.fire("Deleted!", "Successfuly Deleted.", "success").then(function() {
                                    location.href = 'messages.php';
                                })
                            } else {
                                Swal.fire("Error!", "An Error occured.", "error");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            Swal.fire("Error!", "An error occurred.", "error");
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>