<?php

include 'components/connect.php';

session_start();




if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_admins = $conn->prepare("DELETE FROM `admin` WHERE admin_id = ?");
    $delete_admins->bind_param('i', $delete_id);
    $delete_admins->execute();
    header('location:admin-accounts.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en" data-theme="cupcake">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                    'plant-primary': '#E76F51',
                    'plant-primary-bg': 'rgba(231, 111, 81, 0.10)',
                }
            }
        }
    }
    </script>
</head>
<body>

<?php include 'components/admin_header.php'; ?>

<secti class="accounts">
    <h3 class="font-pop text-center text-5xl font-bold text-green-950 mt-10">Admin Accounts</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-10">
    <?php
        $select_accounts = $conn->prepare("SELECT * FROM `admin`");
        $select_accounts->execute();
        $result = $select_accounts->get_result();

        if ($result->num_rows > 0) {
            while ($fetch_accounts = $result->fetch_assoc()) {
    ?>
        <div class="card w-96 bg-base-100 shadow-xl p-5">
            <div class="text-center">
                <p class="font-bold text-3xl pb-3">User ID: <span><?= htmlspecialchars($fetch_accounts['admin_id']); ?></span></p>
                <p class="text-xl">Username: <span><?= htmlspecialchars($fetch_accounts['admin_name']); ?></span></p>
                <p class="text-xl">Email: <span><?= htmlspecialchars($fetch_accounts['admin_email']); ?></span></p>
            </div>
            <a href="admin-accounts.php?delete=<?= htmlspecialchars($fetch_accounts['admin_id']); ?>" onclick="return confirm('Delete this account? The admin-related information will also be deleted!')" class="btn btn-error mt-5">Delete Admin</a>
        </div>
    <?php
            }
        } else {
            echo '<p class="empty">No accounts available!</p>';
        }
        $select_accounts->close();
    ?>
    </div>
</section>

</body>
</html>
