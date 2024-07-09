function toggleMenu() {
    const sideMenu = document.getElementById('sideMenu');
    if (sideMenu.style.width === '250px') {
        sideMenu.style.width = '0';
        document.getElementById('mainContent').style.marginLeft = '0';
    } else {
        sideMenu.style.width = '250px';
        document.getElementById('mainContent').style.marginLeft = '250px';
    }
}

function toggleDropdown() {
    const dropdownContent = document.getElementById('dropdownContent');
    dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
}
