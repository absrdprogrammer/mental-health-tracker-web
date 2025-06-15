<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Journal Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/journal.css'); ?>" />
</head>

<body>
    <!-- Header -->
    <div class="notes-header">
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search journals..." onkeyup="filterJournals()">
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
            <div class="back-icon">
                <a href="<?= base_url('main') ?>" title="Kembali">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </aside>

        <!-- Journals Section -->
        <main class="notes">
            <h1>Your Journals</h1>

            <!-- Tampilkan daftar jurnal dari database -->
            <?php if (!empty($journals)) : ?>
                <?php foreach ($journals as $journal) : ?>
                    <div class="note" style="background-color: <?php echo $journal['color']; ?>" data-id="<?php echo $journal['journal_id']; ?>">
                        <small>
                            <?php
                            $timestamp = strtotime($journal['created_at']);
                            echo date('l,', $timestamp) . "<br>" . date('j F Y', $timestamp);
                            ?>
                        </small>

                        <p><?php echo htmlspecialchars($journal['content']); ?></p>
                        <!-- <small>Sentiment: <?php echo ucfirst($journal['sentiment']); ?></small><br> -->
                        <div class="actions">
                            <button class="edit-btn" onclick="showPopupEdit(<?php echo $journal['journal_id']; ?>, '<?php echo htmlspecialchars($journal['content']); ?>')">✎</button>
                            <form action="<?php echo base_url('journal/delete'); ?>" method="POST" id="journal-form">
                                <input type="hidden" name="journal_id" id="journal-id-delete" value="<?php echo $journal['journal_id']; ?>">
                                <button type="submit" class="delete-btn">🗑</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No journals found. Start writing your first journal!</p>
            <?php endif; ?>
        </main>
    </div>

    <!-- Popup for adding journal -->
    <div class="popup" id="popup">
        <div class="popup-content">
            <h2>Add New Journal</h2>
            <form action="<?php echo base_url('journal/create'); ?>" method="POST" id="journal-form">
                <textarea name="content" id="note-text" placeholder="Write your journal here..." required></textarea>
                <input type="hidden" name="color" id="note-color">
                <button type="submit">Add Journal</button>
                <button type="button" class="bg-gray-500 text-white p-2 rounded" onclick="closePopup()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Popup for adding journal -->
    <div class="popup" id="popup-edit">
        <div class="popup-content">
            <h2>Add New Journal</h2>
            <form action="<?php echo base_url('journal/update'); ?>" method="POST" id="journal-form">
                <input type="hidden" name="journal_id" id="journal-id">
                <textarea name="content" id="note-text-edit" placeholder="Write your journal here..." required></textarea>
                <button type="submit">Sumbit Journal</button>
                <button type="button" class="bg-gray-500 text-white p-2 rounded" onclick="closePopupEdit()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="<?php echo base_url('assets/js/journal.js'); ?>"></script>
</body>

</html>