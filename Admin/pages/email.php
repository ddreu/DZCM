<div class="dashboard-wrapper">
    <header class="dashboard-header">
        <div class="container">
            <h1 class="mb-0">Emails</h1>
        </div>
    </header>

    <?php
    con();

    $page = isset($_GET['current_page']) ? (int)$_GET['current_page'] : 1;
    $page = max($page, 1);
    $recordsPerPage = 10;
    $offset = ($page - 1) * $recordsPerPage;

    $totalQuery = mysqli_query(con(), "SELECT COUNT(*) as count FROM quote");
    $totalQuotes = mysqli_fetch_assoc($totalQuery)['count'];
    $totalPages = ceil($totalQuotes / $recordsPerPage);


    $sql = "
        SELECT * FROM quote
        ORDER BY quote_id DESC
        LIMIT $offset, $recordsPerPage
    ";
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

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=email&current_page=<?php echo $page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php echo ($i === $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=email&current_page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=email&current_page=<?php echo $page + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>