<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>MindfulMatters</title>
    <link rel="icon" type="image/png" href="img/logo.png" sizes="40x40" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Roboto:wght@400&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/landing_page.css'); ?>">
    <!-- External CSS file -->
</head>

<body>
    <!-- Header Section -->
    <header class="flex items-center justify-between px-4 py-3 bg-white">
        <div class="logo-container flex items-center">
            <img src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Logo" class="logo-icon h-20 mr-2" />
            <span class="logo-text text-xl font-bold">MindfulMatters</span>
        </div>

        <nav class="nav-links hidden md:flex space-x-6">
            <a href="#" class="text-black hover:text-sky-400">Services</a>
            <a href="#" class="text-black hover:text-sky-400">About</a>
            <a href="#" class="text-black hover:text-sky-400">News</a>
        </nav>

        <div class="header-right flex items-center">
            <button class="hamburger-menu md:hidden">
                <i class="fas fa-bars text-black text-2xl"></i>
            </button>
            <form action="<?php echo base_url('auth'); ?>" method="POST">
                <button type="submit" class="get-help-btn bg-blue-500 text-white px-4 py-2 rounded-full my-4">Sign in</button>
            </form>

        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero px-8 py-12">
        <div class="container mx-auto flex flex-col">
            <div class="flex flex-col md:flex-row items-center">
                <!-- Text Content Section -->
                <div class="w-full md:w-1/2 mb-8 md:mb-0 text-left">
                    <!-- Tag line with pill style -->
                    <div class="mb-6">
                        <span class="px-4 py-1.5 rounded-full border border-gray-300 text-gray-800 text-sm font-medium tracking-wide bg-white"> Glow Up Starts Inside </span>
                    </div>

                    <!-- Main Heading with custom styling -->
                    <h1 class="font-serif text-5xl md:text-[4.5rem] leading-[1.1] mb-8">
                        <div class="flex flex-col gap-1">
                            <span class="block text-amber-800 font-medium">Track Your Mood</span>
                            <span class="block text-amber-800 font-medium text-4xl md:text-[3.5rem]">Journal Your Journey </span>
                            <div class="flex items-center gap-4">
                                <span class="text-gray-900 font-medium">Stay</span>
                                <span class="text-gray-900 font-medium">Motivated</span>
                            </div>
                        </div>
                    </h1>

                    <!-- Description text -->
                    <p class="text-gray-800 text-lg leading-relaxed mb-8">
                        <span class="inline-block mr-2">
                             <!-- Opening heart icon -->
                        <svg class="w-6 h-6 text-red-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </span>
                    Prioritize your mental wellness with mood tracking, journaling, and daily motivation. Reflect on your growth and take the next step.
                    <span class="inline-block ml-2">
                        <!-- Closing heart icon -->
                        <svg class="w-6 h-6 text-red-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                        </svg>
                    </span>
                </p>

                    <!-- Scroll Down Arrow in Circle -->
                    <div class="flex items-center">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white shadow-sm">
                            <i class="fas fa-arrow-down text-gray-600 text-xl animate-bounce"></i>
                        </div>
                    </div>
                </div>

                <!-- Optional: Add custom font -->
                <style>
                    .font-serif {
                        font-family: "Playfair Display", serif;
                    }
                </style>

                <div class="w-full md:w-1/2 flex justify-center">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="relative">
                            <img src="https://storage.googleapis.com/a1aa/image/hgBuAEnskbqWF9PnJeioEL6m3qxNNMtSzEoS3qyz1Osk2w0JA.jpg" alt="Person looking happier" class="w-60 h-60 object-cover rounded-lg shadow-lg" />
                            <div class="absolute left-0 top-0 bg-yellow-500 text-white px-2 py-1 rounded-lg text-sm font-medium transform translate-x-1/4 translate-y-1/4">Happier</div>
                        </div>
                        <div class="relative">
                            <img src="https://storage.googleapis.com/a1aa/image/qVDYNePeKmvONEH585s9OIiTIXtNgS43atwfFEude8Dc0GmOB.jpg" alt="Person looking calm" class="w-60 h-60 object-cover rounded-lg shadow-lg" />
                            <div class="absolute top-0 right-0 bg-green-600 text-white px-2 py-1 rounded-lg text-sm font-medium transform -translate-x-1/4 -translate-y-1/4">Calm</div>
                        </div>
                        <div class="relative col-span-2">
                            <img src="https://storage.googleapis.com/a1aa/image/kqvwQ0apaY7gCNdzJ3GLLOXmpkJOZTza3Xp0Z3awJc2SbY6E.jpg" alt="Person looking positive" class="w-60 h-60 object-cover rounded-lg shadow-lg mx-auto" />
                            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-red-800 text-white px-2 py-1 rounded-lg text-sm font-medium">Positive</div>
                                    <div class="bg-white text-red-400 px-2 py-1 rounded-lg text-lg font-medium shadow-md">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                                <div class="bg-white w-20 h-20 rounded-lg flex items-center justify-center shadow-md -mt-4 mx-auto">
                                    <img src="https://storage.googleapis.com/a1aa/image/kqvwQ0apaY7gCNdzJ3GLLOXmpkJOZTza3Xp0Z3awJc2SbY6E.jpg" alt="Person looking positive" class="w-16 h-16 object-cover rounded-lg" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Help Section -->
    <section class="bg-white py-8 px-4 md:px-16">
        <div class="container mx-auto">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <!-- Left side - Illustration -->
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <div class="relative">
                        <!-- Main Illustration Container -->
                        <div class="flex items-center justify-center">
                            <!-- Doctor Figure -->
                            <div class="flex-shrink-0">
                                <div class="bg-white p-4 rounded-xl">
                                    <img src="<?php echo base_url('assets/img/konsul.png'); ?>" alt="Doctor" class="w-80 h-80 object-cover" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right side - Content -->
                <div class="w-full md:w-1/2 md:pl-12">
                    <h2 class="text-4xl md:text-5xl font-serif mb-6">
                        <span class="text-gray-900">How</span>
                        <span class="text-brown-500">can we</span>
                        <br />
                        <span class="text-brown-500">support you?</span>
                        <span class="inline-block ml-2">
                            <svg class="w-8 h-8 text-yellow-400" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2L14.2451 8.90983H21.5106L15.6327 13.1803L17.8779 20.0902L12 15.8197L6.12215 20.0902L8.36729 13.1803L2.48944 8.90983H9.75486L12 2Z" />
                            </svg>
                        </span>
                    </h2>

                    <div class="space-y-4 text-gray-700 text-lg">
                        <p>At MindfulMatters, we collaborate with mental health specialists to design impactful tools and programs that boost your emotional well-being and mental strength.</p>
                    </div>

                    <div class="mt-8">
                        <a href="#" class="inline-flex items-center px-6 py-3 bg-black text-white rounded-full text-lg font-medium transition-colors hover:bg-gray-800">
                            Get Help
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Growth Section -->
    <section class="bg-emerald-900 min-h-screen py-10 px-5 md:px-16 relative overflow-hidden">
        <!-- Main Content Container -->
        <div class="container mx-auto max-w-7xl">
            <div class="flex flex-col lg:flex-row items-start justify-between gap-16">
                <!-- Left Content -->
                <div class="w-full lg:w-1/2 pt-8">
                    <!-- Tag -->
                    <div class="inline-block mb-10">
                        <span class="border border-white/30 text-white px-8 py-2.5 rounded-full text-sm tracking-wider font-medium"> CARING IS ALWAYS FREE </span>
                    </div>

                    <!-- Main Heading -->
                    <h2 class="font-serif text-5xl md:text-6xl text-white leading-tight mb-10">
                        Empower
                        <div class="relative inline-block my-2">
                            <span class="text-yellow-400">Your Mind</span>
                            <div class="absolute -bottom-1 left-0 w-full h-0.5 bg-yellow-400/90"></div>
                        </div>
                        <br />
                        <span>Enhance Your Life</span>
                    </h2>

                    <!-- Description -->
                    <p class="text-gray-200/90 text-lg leading-relaxed max-w-xl mb-16">Consistent mindfulness and self-care practices can foster resilience, promote emotional well-being, and enhance your overall quality of life.</p>

                    <!-- Sunflower Container -->
                </div>

                <!-- Right Card Section with Vertical Lines -->
                <div class="w-full lg:w-1/2 pt-10">
                    <div class="relative max-w-md mx-auto">
                        <!-- Vertical Lines using Tailwind -->
                        <div class="absolute -left-6 top-0 h-full flex gap-1.5">
                            <!-- White line -->
                            <div class="w-1 h-full bg-gradient-to-b from-white/90 via-white/80 to-white/90 rounded-full shadow-sm"></div>
                            <!-- Teal line -->
                            <div class="w-1 h-full bg-gradient-to-b from-teal-600/50 via-teal-700/40 to-teal-600/50 rounded-full"></div>
                            <!-- Dark line -->
                            <div class="w-1 h-full bg-gradient-to-b from-emerald-800/30 via-emerald-900/20 to-emerald-800/30 rounded-full"></div>
                        </div>

                        <!-- Leaf Decoration using Tailwind -->
                        <div class="absolute -right-8 top-1/2 -translate-y-1/2">
                            <div class="space-y-2">
                                <div class="w-8 h-3 bg-green-400/20 rounded-full rotate-45"></div>
                                <div class="w-8 h-3 bg-green-400/20 rounded-full rotate-45"></div>
                                <div class="w-8 h-3 bg-green-400/20 rounded-full rotate-45"></div>
                            </div>
                        </div>

                        <!-- Main Card -->
                        <div class="bg-white rounded-3xl overflow-hidden shadow-xl relative">
                            <!-- Image Container -->
                            <div class="aspect-[4/4] w-full overflow-hidden">
                                <img src="<?php echo base_url('assets/img/happy.jpeg'); ?>" alt="Children playing puzzle" class="w-full h-full object-cover" />
                            </div>

                            <!-- Card Content -->
                            <!-- <div class="p-6"> -->
                            <!-- Title and Arrow Container -->
                            <!-- <div class="flex items-center justify-between border-b border-gray-300 pb-4 mb-4 bg-gray-50 relative">
                                    <h3 class="text-2xl font-semibold text-gray-900">Navigating Your Journey</h3>
                                    <div class="bg-yellow-400 p-2 rounded-lg transition-all hover:scale-110 cursor-pointer group relative">
                                        <svg class="w-6 h-6 text-gray-800 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                        <span class="absolute left-1/2 transform -translate-x-1/2 -translate-y-full mt-1 bg-gray-800 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            Click for more info
                                        </span>
                                    </div>
                                </div> -->

                            <!-- Description -->
                            <!-- <p class="text-gray-700 text-lg leading-relaxed">Reach out to program from college to elementary school students</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-20">
        <h2 class="text-3xl font-bold mb-12 text-center text-gray-800 uppercase tracking-widest"><span class="text-4xl">Bring your inner </span><span class="text-amber-800">peace</span></h2>

        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <img src="<?php echo base_url('assets/img/wordspace.jpeg'); ?>" alt="Self care" class="mx-auto rounded-xl mb-4 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-cover" />
                    <h3 class="font-semibold mb-2 text-base sm:text-lg md:text-xl">Wordspace</h3>
                    <p class="text-gray-600 text-sm sm:text-base">Write, edit, and save motivational quotes to share or store in your wordspace.</p>
                </div>
                <div class="text-center">
                    <img src="<?php echo base_url('assets/img/dokter.jpeg'); ?>" alt="Mind reset" class="mx-auto rounded-full mb-4 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-cover" />
                    <h3 class="font-semibold mb-2 text-base sm:text-lg md:text-xl">Book a Psychologist</h3>
                    <p class="text-gray-600 text-sm sm:text-base">Schedule sessions with psychologists based on expertise and availability online.</p>
                </div>
                <div class="text-center">
                    <img src="<?php echo base_url('assets/img/jurnal.jpeg'); ?>" alt="Positive practices" class="mx-auto rounded-full mb-4 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-cover" />
                    <h3 class="font-semibold mb-2 text-base sm:text-lg md:text-xl">Personal Journal</h3>
                    <p class="text-gray-600 text-sm sm:text-base">Track emotions, add tags, and view trends to understand your emotional patterns.</p>
                </div>
                <div class="text-center">
                    <img src="<?php echo base_url('assets/img/emotion.jpeg'); ?>" alt="Psychology" class="mx-auto rounded-full mb-4 w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 object-cover" />
                    <h3 class="font-semibold mb-2 text-base sm:text-lg md:text-xl">Mood Tracker</h3>
                    <p class="text-gray-600 text-sm sm:text-base">The Mood Tracker lets users log emotions daily, helping identify trends and understand emotional shifts.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section class="bg-gradient-to-br py-10 relative">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-center gap-6 relative">
                <!-- Light background behind the brown container -->
                <div class="absolute inset-0 z-0 bg-[#f7f0e8] rounded-xl"></div>

                <div class="md:w-1/3 mb-6 md:mb-0 z-10">
                    <div class="bg-[#49382e] p-8 rounded-3xl max-w-xs mx-auto">
                        <img src="<?php echo base_url('assets/img/dctr.png'); ?>" alt="Doctor" class="rounded-3xl mb-8 shadow-lg w-32 h-32 md:w-64 md:h-64 mx-auto" />
                        <h3 class="text-2xl font-semibold text-white text-center mb-1">Dr. Sarah Kim</h3>
                        <p class="text-sm text-gray-300 text-center mb-2">Mental Health Specialist</p>
                    </div>
                </div>

                <div class="md:w-2/3 px-6 z-10">
                    <h2 class="text-2xl md:text-4xl font-bold text-gray-800 mb-8 text-center md:text-left">“A <span class="text-red-500">connection</span> that changes lives”</h2>
                    <div class="mb-4">
                        <p class="text-gray-600 mb-1"><b>Alex,</b> Client</p>
                        <p class="text-lg text-gray-700 italic mb-6">"I never expected that sharing my story could bring me such relief. It's a significant step in my journey."</p>
                    </div>
                    <div>
                        <p class="text-gray-600 mb-1"><b>Rangga,</b> Client</p>
                        <p class="text-lg text-gray-700 italic mb-6">"My first session here was transformative. I finally found a place where I can be myself and work through my challenges."</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Articles Section -->
    <section class="py-20">
        <h2 class="text-2xl md:text-4xl font-serif mb-6 ml-40">
            <span class="text-gray-900">The Latest from </span>
            <span class="text-amber-800">MindfulMatters</span>
        </h2>
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-[#F7F0E8] rounded-3xl overflow-hidden shadow-lg p-4 flex flex-col justify-between">
                    <h3 class="font-bold mb-2">
                        <a href="https://www.bcmhsus.ca/about-us/news-features/10-tips-boost-your-mental-health" class="text-gray-900 hover:underline">10 tips to boost your mental health</a>
                    </h3>
                    <div class="flex items-end mb-2">
                        <a
                            href="https://www.bcmhsus.ca/about-us/news-features/10-tips-boost-your-mental-health"
                            class="bg-white text-black border rounded-2xl py-1 px-2 hover:bg-gray-100 hover:shadow-md text-xs transition duration-300 ease-in-out transform hover:scale-95">Read More</a>
                        <img src="<?php echo base_url('assets/img/chill.png'); ?>" alt="Article 1 Image" class="w-48 h-32 object-cover ml-auto" />
                    </div>
                </div>

                <div class="bg-[#C5F280] rounded-3xl overflow-hidden shadow-lg p-4 flex flex-col justify-between h-full">
                    <h3 class="font-bold mb-1">
                        <a href="https://www.halodoc.com/artikel/ketahui-5-manfaat-meditasi-untuk-kesehatan-mental?srsltid=AfmBOopu9gGrFilhGRMyVvgwd25RkVBtLWjYgFs1_Iij--sLq1_htqnX" class="text-gray-900 hover:underline">Ketahui 5 Manfaat Meditasi untuk Kesehatan Mental</a>
                    </h3>
                    <div class="flex items-end mb-2">
                        <a
                            href="https://www.halodoc.com/artikel/ketahui-5-manfaat-meditasi-untuk-kesehatan-mental?srsltid=AfmBOopu9gGrFilhGRMyVvgwd25RkVBtLWjYgFs1_Iij--sLq1_htqnX"
                            class="bg-white text-black border rounded-2xl py-1 px-2 hover:bg-gray-100 hover:shadow-md text-xs transition duration-300 ease-in-out transform hover:scale-95">Read More</a>
                        <img src="<?php echo base_url('assets/img/talk.png'); ?>" alt="Article 2 Image" class="w-45 h-32 object-cover ml-auto" />
                    </div>
                </div>

                <div class="bg-[#FFD86F] rounded-3xl overflow-hidden shadow-lg p-4 flex flex-col justify-between h-full">
                    <h3 class="font-bold mb-1">
                        <a href="https://yankes.kemkes.go.id/view_artikel/362/mengenal-pentingnya-kesehatan-mental-pada-remaja" class="text-gray-900 hover:underline">Mengenal Pentingnya Kesehatan Mental pada Remaja</a>
                    </h3>
                    <div class="flex items-end mb-2">
                        <a
                            href="https://yankes.kemkes.go.id/view_artikel/362/mengenal-pentingnya-kesehatan-mental-pada-remaja"
                            class="bg-white text-black border rounded-2xl py-1 px-2 hover:bg-gray-100 hover:shadow-md text-xs transition duration-300 ease-in-out transform hover:scale-95">Read More</a>
                        <img src="<?php echo base_url('assets/img/ekspresi.png'); ?>" alt="Article 3 Image" class="w-42 h-32 object-cover ml-auto" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-700 text-white py-10">
        <div class="container mx-auto px-4">
            <!-- Logo and Social Media Section -->
            <div class="flex flex-col items-center mb-12">
                <!-- Logo and Name -->
                <div class="flex items-center mb-4">
                    <!-- Custom Logo Text -->
                    <span class="text-3xl md:text-2xl font-bold tracking-wide uppercase text-amber-800">
                        <span class="bg-gradient-to-r from-amber-600 via-yellow-700 to-yellow-700 bg-clip-text text-transparent">Mindful</span>
                        <span class="text-gray-200">Matters</span>
                    </span>
                </div>

                <!-- Social Media Icons Below Logo -->
                <div class="flex space-x-8 text-xl mt-4">
                    <a href="#" class="hover:text-blue-500 transition duration-300" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="hover:text-blue-700 transition duration-300" aria-label="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="hover:text-pink-500 transition duration-300" aria-label="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="hover:text-red-600 transition duration-300" aria-label="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#" class="hover:text-blue-500 transition duration-300" aria-label="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>

                <!-- Navigation Menu -->
                <nav class="flex flex-wrap justify-center space-x-6 mt-6">
                    <a href="#" class="hover:text-teal-400 transition duration-300">Home</a>
                    <a href="#" class="hover:text-teal-400 transition duration-300">About Us</a>
                    <a href="#" class="hover:text-teal-400 transition duration-300">Services</a>
                    <a href="#" class="hover:text-teal-400 transition duration-300">Contact</a>
                </nav>
            </div>

            <!-- Statistics and Copyright Section
            <div class="flex flex-col md:flex-row justify-between items-center">
                Statistics with Border Effect -->
            <!-- <div class="flex space-x-2 mb-10 md:mb-0 text-center">
                    <div class="border-l-2 border-teal-400 pl-2">
                        <p class="text-2xl font-extrabold">48<span class="text-teal-400">+</span></p>
                        <p class="text-gray-400">Experts</p>
                    </div>
                    <div class="border-l-2 border-teal-400 pl-2">
                        <p class="text-2xl font-extrabold">93<span class="text-teal-400">%</span></p>
                        <p class="text-gray-400">Happy Patients</p>
                    </div>
                </div> -->

            <!-- Copyright Section with Hover Effect -->
            <div class="text-gray-400 text-sm md:text-right ml-4">
                <p>© 2024 MindfulMatters. Design by <span class="text-white hover:underline cursor-pointer transition duration-300">Someone</span></p>
            </div>
        </div>
        </div>
    </footer>

    <!-- Add Font Awesome for Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>