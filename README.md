# Custom TAO Extension Sample

## Installation

1. From the root of your TAO installation, edit composer.json and add the following. If these sections already exist, add the contents to the existing sections.

    ```json
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/joe-niland/taoExtensionTest.git"
        }
    ],


    "require" : {
        "joe-niland/tao-extension-test": "dev-main"
    }
    ```

2. Run `composer update` to download the extension.
3. (Optional) Set DEBUG_MODE to true in config/generis.conf.php
4. (Optional) Enable debug logging by adding the following to config/generis/log.conf.php:

    ```php
    return new oat\oatbox\log\LoggerService(
        array(
            'logger' => array(
                'class' => \oat\oatbox\log\logger\TaoMonolog::class,
                'options' => array(
                    'name' => 'tao',
                    'handlers' => array(

                        // Send log to a stream, could be a file or a daemon
                        array(
                            'class' => \Monolog\Handler\StreamHandler::class,
                            'options' => array(
                                '/var/www/html/data/log/tao.log',
                                \Monolog\Logger::DEBUG
                            ),
                        ),
                    )
                )
            )
        )
    );  
    ```

5. Log in to your TAO instance as admin
6. Go to `/tao/Main/index?structure=settings&ext=tao&section=settings_ext_mng`

    Your extension should be on the right side of the screen
    Click on the extension checkbox and click install
