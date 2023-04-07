
Birthday Ecard Generator
========================

This repository contains an auto birthday ecard generating system built using PHP. With this system, you can upload two pictures of yourself, and on your birthday, you will receive birthday graphics via email. This system can be used for personal or business purposes to send birthday greetings automatically to your friends, family, or colleagues.

Features
--------

*   Automated birthday ecard generation system
*   Uses PHP for server-side scripting
*   Sends birthday graphics via email
*   Easy to customize and use

Requirements
------------

*   PHP 5.4 or higher
*   Web server (Apache, Nginx, etc.)
*   Mail server (Postfix, Sendmail, etc.)
*   ImageMagick (for image processing)

Installation
------------

1.  Clone the repository to your local machine using the command `git clone https://github.com/NobleOsinachi/BirthdayEcardGenerator.git`.
2.  Copy the files to your web server.
3.  Install ImageMagick on your server.
4.  Update the `config.php` file with your email settings and other configuration details.
5.  Upload two pictures of yourself to the `images` directory.
6.  Schedule a cron job to run the `cron.php` file every day to check for upcoming birthdays and send out emails.

Customization
-------------

You can customize the ecard graphics by editing the `ecard.php` file. You can modify the HTML and CSS to change the layout and design of the ecard. You can also modify the PHP code to add or remove functionality.

Usage
-----

To use this system, simply upload two pictures of yourself to the `images` directory and set up a cron job to run the `cron.php` file every day. On your birthday, you will receive an email with birthday graphics generated using your uploaded images.

License
-------

This project is licensed under the MIT License. See the LICENSE file for more information.

Contributing
------------

If you want to contribute to this project, feel free to submit a pull request or open an issue on GitHub.

Credits
-------

This project was created by \[Noble Osinachi\]. Special thanks to \[David & Joan\] for their contributions to the project.
