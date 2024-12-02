<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wordspace</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/journal.css'); ?>" />
</head>

<body>
    <!-- Notes Header with Search Bar -->
    <div class="notes-header">
        <div class="search-bar">
            <input type="text" id="searchInput" class="search-input" placeholder="Search Messages...">
        </div>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2>Journal</h2>
            <button class="add-btn">+</button>
            <ul class="color-options">
                <li class="color yellow" onclick="showPopup('#ffd54f')"></li>
                <li class="color orange" onclick="showPopup('#ff8a65')"></li>
                <li class="color purple" onclick="showPopup('#ba68c8')"></li>
                <li class="color blue" onclick="showPopup('#4fc3f7')"></li>
            </ul>
        </aside>

        <!-- Journals Section -->
        <main class="notes">
            <h1>BE KIND TO YOUR MIND</h1>
            <!-- Tampilkan daftar jurnal dari database -->
            <?php if (!empty($messages)) : ?>
                <?php foreach ($messages as $message) : ?>
                    <div class="note" style="background-color: <?php echo $message['color']; ?>" data-id="<?php echo $message['message_id']; ?>">
                        <i class="fas fa-quote-left"></i>
                        <p><?php echo htmlspecialchars($message['content']); ?></p>
                        <i class="fas fa-quote-right"></i>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No messages found. Start writing your first journal!</p>
            <?php endif; ?>
        </main>
    </div>

    <!-- Popup for adding journal -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>Add New Messages</h2>
            <form action="<?php echo base_url('wordspace/create'); ?>" method="POST" id="wordspace-form">
                <textarea name="content" id="note-text" placeholder="Write your message here..." required></textarea>
                <input type="hidden" name="color" id="note-color">
                <button type="submit">Post Message</button>
                <button type="button" class="close-btn" onclick="closePopup()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="<?php echo base_url('assets/js/journal.js'); ?>"></script>
</body>

</html>