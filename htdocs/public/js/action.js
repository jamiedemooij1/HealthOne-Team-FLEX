const dropwdownbox = document.querySelector('.menu-box');

let checkLogin = "<?php global $_SESSION['login'] ?>";
checkLogin = "true";
if (checkLogin == "true") {
    dropwdownbox.classList.add('dropbox');
    
} else if (checkLogin = "false") {
    dropwdownbox.classList.remove('dropbox');
}
