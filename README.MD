# ATTRIBUTE VALIDATORS

This project was based on Master Celso project's (from 85 bits developer channel) and improved by me (Tio Jobs).

The main goal of this project was practice the new PHP ATTRIBUTES.

For more contents, please, watch my videos on youtube:
[Tio Jobs Channel](https://youtube.com/c/TioJobs/join)

### XDEBUG SETTINGS FOR UBUNTU LINUX AND VSCODE:
 - 1) Copy the /docs/launch.json to /.vscode/
 - 2) Edit your /etc/php8.x/cli/conf.d/xx-xdebug.ini with the following settings:
 ```
 zend_extension=xdebug.so
xdebug.mode=debug,develop
xdebug.start_with_request=yes
xdebug.connect_timeout_ms=2000
 ```
 - 3) Start your server with the following command:
 ```
 $ php -S localhost:8000
 ```

  - 4) Press F5 to activate xdebug inside vscode
  - 5) On browser, install xdebug helper and enable it
  - 6) Add a break point on desire line
  - 7) Open your browser, put the project URL and enjoy it!