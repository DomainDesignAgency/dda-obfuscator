# DDA Obfuscator
Adds an email obfuscator to your wordpress site.

## Instalation

### Via FTP
1. Upload the dda-obfuscator folder to your /wp-content/plugins/ directory
2. Activate the plugin through the ‘Plugins’ menu in WordPress
3. Done!

### Via Upload Plugin Button
1. Select the dda-obfuscator.zip file
2. Activate the plugin through the ‘Plugins’ menu in WordPress
3. Done!

## Usage
[![hide-email.gif](https://i.postimg.cc/2SRkWTGj/hide-email.gif)](https://postimg.cc/rKj2X177)

### Content Editor
1. Highlight the email address you wish to hide
2. Click the hide email button
3. Add the first part of the email address in the user="add-here"
4. Add the domain in domain="add-domain-here.com"

**Example**
jon@mydomain.com would be
```
[dda_obfuscator user="jon" domain="mydomain.com"]jon@mydomain.com[/dda_obfuscator]
```