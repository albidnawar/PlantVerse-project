<!DOCTYPE html>
<html lang="en" data-theme="cupcake">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlantVerse</title>
    <link rel="icon" href="images/tab-logo.png" type="image/x-icon">
    <!-- tailwind & daisyui cdn -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.6.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- tailwind custom classes -->
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
    <!--custom styles-->
    <style>
        .font-pop {
            font-family: 'Poppins', sans-serif;

        }

        .custom-hr {
            width: 1288px;
            height: 1px;
            background: #1E1E1E;
            border: none;
            margin: 0;
        }
    </style>
</head>

<body class="w-[1519px] h-[1000px] bg-no-repeat bg-cover bg-left"
    style="background-image: url(images/backdrop-green-leaves.jpg)" ;>
    <!-- Header -->
    <header class="md:container md:mx-auto">
        <!-- Nav bar -->
        <?php include 'components/navbar.php'; ?>



        <!-- variety options -->
        <div class="join flex justify-center  mt-5 gap-5">
            <a href="landing-page.php"><button class="btn btn-outline btn-info">Popular</button></a>
            <a href="Indoor.php"><button class="btn btn-outline btn-success">Indoor</button></a>
            <a href="outdoor.php"><button class="btn btn-outline btn-warning">Outdoor</button></a>
        </div>
    </header>
    <main class="h-screen flex items-center justify-center">
        <!-- profile and placed orders -->
        <div class="flex gap-20 mt-10">
            <div class="card w-96 bg-base-100 shadow-xl">
                <div class="card-body">
                    <h2 class="card-title text-3xl">User Info</h2>
                    <form action="update_user.php" method="POST">
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Your Name</span>
                            </div>
                            <input type="text" name="name" placeholder="Type here" class="input input-bordered w-full max-w-xs" />
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Your Email Address</span>
                            </div>
                            <input type="email" name="email" placeholder="Email Address" class="input input-bordered w-full max-w-xs" />
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Your Phone Number</span>
                            </div>
                            <input type="text" name="phone" placeholder="Phone" class="input input-bordered w-full max-w-xs" />
                        </label>
                        <h2 class="card-title mt-5">Change Password</h2>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Password</span>
                            </div>
                            <input type="password" name="password" placeholder="Password" class="input input-bordered w-full max-w-xs" />
                        </label>
                        <label class="form-control w-full max-w-xs">
                            <div class="label">
                                <span class="label-text">Rewrite Password</span>
                            </div>
                            <input type="password" name="password_confirmation" placeholder="Rewrite Password" class="input input-bordered w-full max-w-xs" />
                        </label>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>

            <!-- Order details -->
            <div class="card w-[600px]  bg-base-100 shadow-xl">
                <div class="overflow-x-auto">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          <th>Order No</th>
                          <th>Date</th>
                          <th>Status</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        <tr class="hover">
                          <th>#AN0001</th>
                          <td>June 01,2024</td>
                          <td>placed</td>
                          <td>$135.00</td>
                        </tr>
                        <!-- row 2 -->
                        <tr class="hover">
                            <th>#AN0001</th>
                            <td>June 01,2024</td>
                            <td>placed</td>
                            <td>$135.00</td>
                          </tr>
                        <!-- row 3 -->
                        <tr class="hover">
                            <th>#AN0001</th>
                            <td>June 01,2024</td>
                            <td>placed</td>
                            <td>$135.00</td>
                          </tr>
                        <!-- row 04 -->
                        <tr class="hover">
                            <th>#AN0001</th>
                            <td>June 01,2024</td>
                            <td>placed</td>
                            <td>$135.00</td>
                          </tr>
                        <!-- row 05 -->
                        <tr class="hover">
                            <th>#AN0001</th>
                            <td>June 01,2024</td>
                            <td>placed</td>
                            <td>$135.00</td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
            </div>            
        </div>

    </main>
    <?php include 'components/footer.php'; ?>

</body>

</html>