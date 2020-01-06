<?php
class Template
{

    private $title;
    private $bodyContent;

    public function __construct($title, $bodyContent)
    {
        $this->title = $title;
        $this->bodyContent = $bodyContent;
    }

    public function render()
    {
        echo "
            <!doctype html>
            <html lang='en'>
                <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

                    <link rel='stylesheet' href='/assets/theme.css'>

                    <title>{$this->title}</title>
                </head>
                <body>
                    {$this->bodyContent}

                    <script src='/assets/theme.js'></script>
                </body>
            </html>
        ";
    }
}
