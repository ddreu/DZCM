<div class="dashboard-wrapper">
    <header class="dashboard-header">
        <div class="container">
            <h1 class="mb-0">Emails</h1>
        </div>
    </header>
    <?php
    con();
    $sql = "SELECT * FROM quote";
    $result = mysqli_query(con(), $sql);
    ?>

    <div class="container mt-5">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
                        <!--   <th scope="col">Status</th> -->
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($quote = mysqli_fetch_assoc($result)): ?>
                        <tr class="quote-row" data-service-id="<?php echo $quote['quote_id']; ?>"
                            data-service-name="<?php echo htmlspecialchars($quote['name']); ?>"
                            data-description="<?php echo htmlspecialchars($quote['email']); ?>"
                            data-image="<?php echo htmlspecialchars($quote['phone']); ?>"
                            data-bs-toggle="modal" data-bs-target="#">
                            <td><?php echo htmlspecialchars($quote['quote_id']); ?></td>
                            <td><?php echo htmlspecialchars($quote['name']); ?></td>
                            <td><?php echo htmlspecialchars($quote['email']); ?></td>
                            <td><?php echo htmlspecialchars($quote['phone']); ?></td>
                            <td><?php echo htmlspecialchars($quote['message']); ?></td>
                            <td><?php echo htmlspecialchars($quote['date']); ?></td>

                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>