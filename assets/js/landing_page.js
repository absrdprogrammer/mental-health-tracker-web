document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('dropdown-toggle').addEventListener('click', function(event) {
        event.preventDefault();
        var dropdownContent = document.getElementById('dropdown-content');
        if (dropdownContent.style.display === 'block') {
            dropdownContent.style.display = 'none';
        } else {
            dropdownContent.style.display = 'block';
        }
    });

    window.onclick = function(event) {
        if (!event.target.matches('#dropdown-toggle')) {
            var dropdowns = document.getElementsByClassName('dropdown-content');
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    };
});
