<?php
include 'components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin-login.html');
    exit();
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_user = $conn->prepare("DELETE FROM `users` WHERE id = ?");
    $delete_user->bind_param("i", $delete_id);
    $delete_user->execute();
    $delete_user->close();
    header('location:admin-usersAccount.php');
    exit();
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

<section class="accounts">
    <h3 class="font-pop text-center text-5xl font-bold text-green-950 mt-10">User Accounts</h3>
    <div class="cards-container flex gap-3 m-10">
    <?php
        $select_accounts = $conn->prepare("SELECT * FROM `users`");
        $select_accounts->execute();
        $result = $select_accounts->get_result();
        
        if ($result->num_rows > 0) {
            while ($fetch_accounts = $result->fetch_assoc()) {
    ?>
        <div class="card w-96 bg-base-100 shadow-xl p-5">
            <div class="text-center">
            <p class="font-bold text-3xl pb-3"> User ID : <span><?= $fetch_accounts['id']; ?></span> </p>
            <p class="text-xl"> Username : <span><?= $fetch_accounts['name']; ?></span> </p>
            <p class="text-xl"> Phone : <span><?= $fetch_accounts['phone']; ?></span> </p>
            <p class="text-xl"> Email : <span><?= $fetch_accounts['email']; ?></span> </p>
            </div>
            <a href="admin-usersAccount.php?delete=<?= $fetch_accounts['id']; ?>" onclick="return confirm('delete this account? the user related information will also be delete!')" class="btn btn-error mt-5">Delete Account</a>
        </div>
    <?php
            }
        } else {
            echo '<p class="empty">no accounts available!</p>';
        }
        $select_accounts->close();
    ?>
    </div>
</section>

</body>
</html>
