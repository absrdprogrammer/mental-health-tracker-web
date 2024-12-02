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
        <button class="add-btn">+</button>
        <ul class="color-options">
            <li class="color yellow" onclick="showPopup('#ffd54f')"></li>
            <li class="color pink" onclick="showPopup('#f472b6')"></li>
            <li class="color blue" onclick="showPopup('#3b82f6')"></li>
            <li class="color purple" onclick="showPopup('#ba68c8')"></li>
            <li class="color white" onclick="showPopup('#ffffff')"></li>
        </ul>
    </aside>

    <!-- Hero Section -->
    <div class="hero">
        <h1 class="hero-title">BE KIND TO YOUR MIND</h1>
        <p class="hero-subtitle">
            Mindspace was started with one mission: to improve the health and happiness of the world.
        </p>
    </div>

    <main class="max-w-7xl mx-auto px-6 py-12">
        <div class="cards-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="cardsGrid">
            <?php if (!empty($messages)) : ?>
                <?php foreach ($messages as $message) : ?>
                    <div class="note-card" style="background-color: <?php echo $message['color']; ?>" data-id="<?php echo $message['message_id']; ?>">
                        <i id="iconBefore" class="fas fa-quote-left"></i>
                        <p class="text-lg"><?php echo htmlspecialchars($message['content']); ?></p>
                        <i id="iconAfter" class="fas fa-quote-right"></i>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No messages found. Start writing your first journal!</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Popup for adding journal -->
    <div class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50" id="popup">
        <div class="popup-content bg-white p-6 rounded-lg w-96">
            <h2>Add New Messages</h2>
            <form action="<?php echo base_url('wordspace/create'); ?>" method="POST" id="wordspace-form">
                <textarea name="content" id="note-text" class="w-full p-2 mb-4 border rounded" placeholder="Write your message here..." required></textarea>
                <input type="hidden" name="color" id="note-color">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Post Message</button>
                <button type="button" class="bg-gray-500 text-white p-2 rounded" onclick="closePopup()">Cancel</button>
            </form>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/journal.js'); ?>"></script>
</body>

</html>