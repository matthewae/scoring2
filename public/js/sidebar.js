document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.querySelector('.flex-1');
    const toggleButton = document.getElementById('sidebarToggle');
    let isCollapsed = false;

    function toggleSidebar() {
        isCollapsed = !isCollapsed;
        if (isCollapsed) {
            sidebar.style.width = '64px';
            mainContent.style.marginLeft = '64px';
            document.querySelectorAll('#sidebar .nav-text').forEach(el => {
                el.style.display = 'none';
            });
            toggleButton.innerHTML = '<i class="fas fa-chevron-right"></i>';
        } else {
            sidebar.style.width = '256px';
            mainContent.style.marginLeft = '256px';
            document.querySelectorAll('#sidebar .nav-text').forEach(el => {
                el.style.display = 'inline';
            });
            toggleButton.innerHTML = '<i class="fas fa-chevron-left"></i>';
        }
    }

    if (toggleButton) {
        toggleButton.addEventListener('click', toggleSidebar);
    }
});
