<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_name'])) {
    $username = $_SESSION['user_name'];
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: sign-in.html");
    exit; // Make sure to exit after redirecting
}
?>

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
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
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
  </style>
</head>

<body class="font-pop">
  <!-- Header -->
  <header class="md:container md:mx-auto">
    <!-- Nav bar -->
    <nav>
      <div class="navbar bg-base-100 justify-between">
        <div class="flex">
          <a class="btn btn-ghost text-xl" href="landing-page.html">PlantVerse</a>
        </div>
        <div class="flex  w-20">
          <img src="images/Plantverse-logo-01.png" alt="">
        </div>
        <div class="flex items-center">
          <!-- others button -->
          <div class="dropdown dropdown-hover">
            <div tabindex="0" role="button" class="btn m-1">Others</div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
              <li><a href="fertilizer.html">Fertilizer</a></li>
              <li><a href="tools.html">Tools</a></li>
            </ul>
          </div>

          <div class="flex items-center justify-between">
            <div class="dropdown dropdown-end px-2">
              <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <div class="indicator">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  <span class="badge badge-sm indicator-item">8</span>
                </div>
              </div>
              <div tabindex="0" class="mt-3 z-[1] card card-compact dropdown-content w-52 bg-base-100 shadow">
                <div class="card-body">
                  <span class="font-bold text-lg">8 Items</span>
                  <span class="text-info">Subtotal: $999</span>
                  <div class="card-actions">
                    <a href="cart.html"><button class="btn btn-primary btn-block">View cart</button></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="dropdown dropdown-end">
              <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="w-10 rounded-full">
                  <?php
                    echo "$username";
                  ?>
                </div>
              </div>
              <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                  <a class="justify-between">
                    Profile

                  </a>
                </li>
                <li><a>Admin</a></li>
                <li><a href="logout.php?action=logout">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>



    <!-- slider -->
    <div class="carousel w-full lg:h-[400px] bg-no-repeat bg-cover bg-left my-5"
      style="background-image: url(images/backdrop-green-leaves.jpg);">
      <!-- slide 01 -->
      <div id="slide1" class="carousel-item relative w-full">
        <div class="flex flex-col lg:flex-row gap-80 p-4 lg:py-6 px-24">
          <div class="space-y-7 flex-1 pl-20">
            <h2 class="text-2xl lg:text-6xl font-bold text-yellow-200	">
              Snake Plant
              <br>
              “Laurentii”
            </h2>
            <p class="text-white">Enjoy a 10% discount on our stunning Snake Plant "Laurentii"! Elevate your space with
              its elegant variegated leaves and air-purifying benefits. Use code "GREEN10" at checkout. Don't miss out,
              offer valid for a limited time only!</p>
            <button class="btn btn-outline btn-primary">Purchase</button>
          </div>
          <div class="flex-1">
            <img src="images/Snake Plant “Laurentii”.png" class="h-[350px]" />
          </div>
        </div>
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
          <a href="#slide4" class="btn btn-circle">❮</a>
          <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
      </div>
      <!-- slide 02 -->
      <div id="slide2" class="carousel-item relative w-full">
        <div class="flex flex-col lg:flex-row gap-80 p-4 lg:py-6 px-24">
          <div class="space-y-7 flex-1 pl-20">
            <h2 class="text-2xl lg:text-6xl font-bold text-yellow-200	">
              Croton Petra
              <br>
              "House Plant"
            </h2>
            <p class="text-white">Meet the Croton Petra: Bursting with vibrant colors, this tropical plant adds flair to
              any space. Easy to care for and air-purifying, it's the perfect statement piece for your home or office.
            </p>
            <button class="btn btn-outline btn-primary">Purchase</button>
          </div>
          <div class="flex-1">
            <img src="images/Croton Petra.png" class="h-[350px]" />
          </div>
        </div>
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
          <a href="#slide1" class="btn btn-circle">❮</a>
          <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
      </div>
      <!-- slide 03 -->
      <div id="slide3" class="carousel-item relative w-full">
        <div class="flex flex-col lg:flex-row gap-80 p-4 lg:py-6 px-24">
          <div class="space-y-7 flex-1 pl-20">
            <h2 class="text-2xl lg:text-6xl font-bold text-yellow-200	">
              Haworthia
              <br>
              Cooperi
            </h2>
            <p class="text-white">Enjoy a 10% discount today and bring home this delightful beauty. With its charming
              rosette shape and translucent leaves, the Haworthia Cooperi adds a touch of elegance to any collection.

              Use code "GREEN10" at checkout to claim your discount. Don't miss out on this limited-time offer!</p>
            <button class="btn btn-outline btn-primary">Purchase</button>
          </div>
          <div class="flex-1">
            <img src="images/Haworthia-cooperi.png" class="h-[350px]" />
          </div>
        </div>
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
          <a href="#slide2" class="btn btn-circle">❮</a>
          <a href="#slide4" class="btn btn-circle">❯</a>
        </div>
      </div>
      <!-- slide 04 -->
      <div id="slide4" class="carousel-item relative w-full">
        <div class="flex flex-col lg:flex-row gap-80 p-4 lg:py-6 px-24">
          <div class="space-y-7 flex-1 pl-20">
            <h2 class="text-2xl lg:text-5xl font-bold text-yellow-200	">
              Chrysanthemum
              <br>
              "Best Seller"
            </h2>
            <p class="text-white">These vibrant flowers symbolize joy and longevity, adding a burst of color to any
              space. Easy to care for and versatile, they thrive in sunlight and well-draining soil. Perfect for autumn
              bouquets or garden beds, Chrysanthemums bring seasonal charm wherever they bloom.</p>
            <button class="btn btn-outline btn-primary">Purchase</button>
          </div>
          <div class="flex-1">
            <img src="images/Chrysanthemum.png" class="h-[350px]" />
          </div>
        </div>
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
          <a href="#slide3" class="btn btn-circle">❮</a>
          <a href="#slide1" class="btn btn-circle">❯</a>
        </div>
      </div>
    </div>
    <!-- variety options -->
    <div class="join flex justify-center my-4 gap-5">
      <a href="landing-page.php"><button class="btn btn-outline btn-info">Popular</button></a>
      <a href="Indoor.html"><button class="btn btn-outline btn-success">Indoor</button></a>
      <a href="outdoor.html"><button class="btn btn-outline btn-warning">Outdoor</button></a>
    </div>
  </header>

  <main>
    <!-- popular carts 01-->
    <div class="flex px-20 py-5 gap-5 justify-between">
      <!-- cart 1 -->
      <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img src="images/philodendron.jpg" alt="philodendron" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Philodendron
            <div class="badge badge-primary">Best Seller</div>
          </h2>
          <p>Heart-shaped leaves, easy indoor care, air-purifying.</p>
          <div class="card-actions flex  items-center justify-between">
            <h3 class="text-2xl">15$</h3>
            <button class="btn btn-success">Buy Now</button>
          </div>
        </div>
      </div>
      <!-- cart 2 -->
      <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img src="images/peace lily.jpg" alt="peace lily" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Peace Lily</h2>
          <p>Graceful, air-purifying, thrives in shade.</p>
          <div class="card-actions flex  items-center justify-between">
            <h3 class="text-2xl">25$</h3>
            <button class="btn btn-success">Buy Now</button>
          </div>
        </div>
      </div>

      <!-- cart 03 -->
      <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img src="images/aloe vera.jpg" alt="aloe vera" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Aloe vera 
            <div class="badge badge-primary">Best Seller</div>
          </h2>
          <p> Succulent superstar, soothing gel, thrives indoors.</p>
          <div class="card-actions flex  items-center justify-between">
            <h3 class="text-2xl">40$</h3>
            <button class="btn btn-success">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
    <!-- popular carts 02-->
    <div class="flex px-20 py-5 gap-5 justify-between">
      <!-- cart 4 -->
      <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img src="images/Monstera-plant.png" alt="Monstera-plant" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Monstera</h2>
          <p>A verdant beauty, its sprawling foliage adds a lush, vibrant presence to any room.</p>
          <div class="card-actions flex  items-center justify-between">
            <h3 class="text-2xl">40$</h3>
            <button class="btn btn-success">Buy Now</button>
          </div>
        </div>
      </div>
      <!-- cart 5 -->
      <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img src="images/rose.png" alt="rose" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Rose</h2>
          <p>With its soft petals and enchanting aroma, this flower embodies timeless beauty and allure.</p>
          <div class="card-actions flex  items-center justify-between">
            <h3 class="text-2xl">40$</h3>
            <button class="btn btn-success">Buy Now</button>
          </div>
        </div>
      </div>

      <!-- cart 6 -->
      <div class="card w-96 bg-base-100 shadow-xl">
        <figure><img src="images/marigold.png" alt="marigold" />
        </figure>
        <div class="card-body">
          <h2 class="card-title">Marigold
            <div class="badge badge-primary">Best Seller</div>
          </h2>
          <p>With vibrant hues reminiscent of sunshine, this flower brings a burst of happiness to any setting.</p>
          <div class="card-actions flex  items-center justify-between">
            <h3 class="text-2xl">40$</h3>
            <button class="btn btn-success">Buy Now</button>
          </div>
        </div>
      </div>
    </div>
  </main>

  <footer>

  </footer>
</body>

</html>