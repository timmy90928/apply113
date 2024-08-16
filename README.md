# apply113

## Start
Run `server run.bat`

## Install
1. Download [PHP], unzip it and put it into the C drive, finally add environment variables.
1. Download and run  `Composer-Setup.exe` of [Composer].
1. Replace [php.ini] with C:\php-*\php.ini
1. Create CI4 project.
    ```bash
    composer create-project codeigniter4/appstarter apply113
    ```
1. Connect https://github.com/timmy90928/apply113.git
    ```bash
    git remote add origin https://github.com/timmy90928/apply113.git
    ```

## Tutorial
* [CI4.pdf](./docs/CI4.pdf)
* MVC architecture
![MVC architecture](./docs/MVC%20architecture.jpg)
* For other tutorials, please refer to `./docs`

[PHP]: https://www.php.net/downloads.php "Download PHP ZIP"
[Composer]: https://getcomposer.org/download/ "Download Composer-Setup.exe"
[php.ini]: ./docs/php.ini, "PHP configuration file"
