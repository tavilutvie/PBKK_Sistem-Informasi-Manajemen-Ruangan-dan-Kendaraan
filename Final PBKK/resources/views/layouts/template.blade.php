<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMRK | {{ $page }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    @yield('main_content')

    <!-- Footer -->
    <div class="container-fluid bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="text-light text-center my-4">Kontak</h1>
                    <p class="text-light text-center">Jl. Raya ITS, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111</p>
                    <p class="text-light text-center">+62 31 599 5111</p>
                    <p class="text-light text-center">its.ac.id</p>
                </div>
                <div class="col-md-4">
                    <h1 class="text-light text-center my-4">Sosial Media</h1>
                    <div class="d-flex justify-content-center">
                        <a href="https://www.facebook.com/its.ac.id" class="btn btn-light mx-1" target="_blank">
                            <img src="./src/icon/FacebookIcon.svg" alt="Facebook Icon">
                        </a>
                        <a href="https://www.instagram.com/its.ac.id/" class="btn btn-light mx-1" target="_blank">
                            <img src="./src/icon/InstagramIcon.svg" alt="Instagram Icon">
                        </a>
                        <a href="https://www.youtube.com/channel/UCZ9Y4Z2Z1Z0Z9Z0Z9Z0Z0Z0" class="btn btn-light mx-1"
                            target="_blank">
                            <img src="./src/icon/YoutubeIcon.svg" alt="Youtube Icon">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <h1 class="text-light text-center my-4">Tentang Kami</h1>
                    <p class="text-light text-center">ITS adalah institut yang berada di Surabaya, Jawa Timur. ITS
                        memiliki banyak fasilitas yang dapat digunakan oleh mahasiswa ITS</p>
                </div>
            </div>
        </div>
    </div>
    <!---->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.2.slim.js" integrity="sha256-OflJKW8Z8amEUuCaflBZJ4GOg4+JnNh9JdVfoV+6biw=" crossorigin="anonymous"></script>
</body>
</html>