<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="./src/js/script.js"></script>

    <link rel="stylesheet" href="./src/css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>LOGIN Page</title>
</head>

<body>
    <header>
        <div class="nav-wrapper">
            <div class="logo-container">
                <img class="logo" src="https://i0.wp.com/uns.ac.id/id/wp-content/uploads/logo-uns-biru.png?fit=528%2C526&ssl=1" alt="Logo">
                <h2>Kelompok 2</h2>
            </div>
        </div>
    </header>

    <div class="login-page">
        <div class="form form-login" style="border-radius: 25px;">
            <h1 class="title">LOGIN</h1>
            <form action="./handler/login_handler.php" method="POST" class="flex flex-col gap-4">
                <input class="p-2 mt-8 rounded-xl border" type="text" name="username" placeholder="Username">
                <div class="relative">
                    <input class="p-2 rounded-xl border w-full" type="password" name="password" placeholder="Password">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                </div>
                <div class="mb-4 px-3">
                    <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                        Password encryption method
                    </label>
                    <select class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="enc_method" name="enc_method" type="enc_method" placeholder="enc_method">
                        <option value="" selected disabled hidden>Pilih method...</option>
                        <option value="md5">MD5</option>
                        <option value="sha1">SHA1</option>
                        <option value="sha256">SHA256</option>
                    </select>
                </div>
                <?php
                if (isset($_SESSION['error'])) {

                    echo "<div class='text-red-600 text-sm'>
                        <p>{$_SESSION['error']}</p>
                      </div>";

                    unset($_SESSION['error']);
                }

                if (isset($_SESSION['success'])) {

                    echo "<div class='text-green-600 text-sm'>
                        <p>{$_SESSION['success']}</p>
                      </div>";

                    unset($_SESSION['success']);
                }
                ?>
                <button type="submit" name="submit" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Login</button>
            </form>

            <div class="mt-5 text-xs flex justify-between items-center text-[#FFF]">
                <p class="text-[#000] text-lg">Tidak punya akun?</p>
                <a href="register1.php" class="py-5 px-10 bg-[#0000FF] border rounded-xl hover:scale-110 duration-300 text-l" >REGISTER</a>
            </div>
        </div>
    </div>
</body>

</html>