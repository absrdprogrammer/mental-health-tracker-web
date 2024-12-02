<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mindfull</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/wordspace.css'); ?>" />
</head>

<body>
    <!-- Notes Header with Search Bar -->
    <div class="notes-header">
        <div class="search-bar">
            <input type="text" id="searchInput" class="search-input" placeholder="Search wordspace...">
        </div>
    </div>


    <aside class="sidebar">
        <!-- <h2 class="sidebar-title text-center text-lg font-semibold mb-4">Docket</h2> -->
        <button class="add-btn" onclick="openPopup()">+</button>
        <ul class="color-options">
            <li class="color yellow" onclick="setColor('#ffd54f')"></li>
            <li class="color pink" onclick="setColor('#f472b6')"></li>
            <li class="color blue" onclick="setColor('#3b82f6')"></li>
            <li class="color purple" onclick="setColor('#ba68c8')"></li>
            <li class="color white" onclick="setColor('#ffffff')"></li>
        </ul>
    </aside>



    <!-- Modal untuk membuat note -->
    <div id="popup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
        <div class="popup-content bg-white p-6 rounded-lg w-96">
            <h2 class="text-xl font-semibold mb-4">Create a wordspace</h2>
            <textarea id="noteContent" placeholder="Write....." class="w-full p-2 mb-4 border rounded"></textarea>
            <div class="flex justify-between">
                <button onclick="closePopup()" class="bg-gray-500 text-white p-2 rounded">Cancel</button>
                <button onclick="saveNote()" class="bg-orange-500 text-white p-2 rounded">Save</button>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <h1 class="hero-title">BE KIND TO YOUR MIND</h1>
        <p class="hero-subtitle">
            Mindspace was started with one mission: to improve the health and happiness of the world.
        </p>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <!-- Cards Section -->
        <div class="cards-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="cardsGrid">
            <div class="testimonial-card card" id="card-1">
                <div class="testimonial-header">
                    <p>Davide, Moscow</p>
                    <p>On using meditation to turn his life around</p>
                </div>
                <i class="fas fa-quote-left text-5xl text-orange-500 mb-4 mt-9"></i>
                <p class="testimonial-text">
                    Changing my thoughts has allowed me to change my life.
                </p>
            </div>

            <div class="audio-card card">
                <h2 class="card-title">Make every day happier</h2>
                <p class="card-text">
                    Do it for yourself, and everyone you love. It only takes a few minutes to find some mindspace.
                </p>
                <div class="audio-player">
                    <button class="play-button">
                        <i class="fas fa-play"></i>
                    </button>
                    <span class="audio-title">Alone time</span>
                    <div class="progress-bar-container">
                        <div class="progress-bar"></div>
                    </div>
                    <span class="time-details">4:23</span>
                    <span class="time-details">16:20</span>
                </div>
            </div>

            <div class="sleep-card card">
                <span class="badge">Sleep</span>
                <h2 class="card-title">Get more goodnights</h2>
                <p class="card-text">
                    Put your mind to bed, wake up refreshed, and make good days your new normal.
                </p>

            </div>
        </div>

    </main>

    <script src="<?php echo base_url('assets/js/wordspace.js'); ?>"></script>
</body>

</html>