// Grab all mail tos
user = document.querySelectorAll('[data-user]');

// unscramble the email
// <a data-user="walter" data-site="walt.com" href="#">Enable Javascript</a>
const obfuscator = (userName) => {
    const user = userName;
  
    for(x = 0; x < user.length; x++) {
      user[x].innerHTML = user[x].dataset.user + '@' + user[x].dataset.site;
      user[x].href = 'mailto:' + user[x].dataset.user + '@' + user[x].dataset.site;
    }
  
}

obfuscator(user);