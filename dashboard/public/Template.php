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
                    <div class='d-flex flex-column vw-100 min-vh-100'>
                        <nav class='navbar navbar-expand-lg navbar-light bg-light fixed-top'>
                            <a class='navbar-brand' href='/'>Analytics <small class='text-muted'>Service</small></a>
                        </nav>

                        <main class='d-flex flex-grow-1' style='margin-top:70px'>
                            {$this->bodyContent}
                        </main>

                        <script src='/assets/theme.js'></script>
                    </div>
                </body>
            </html>
        ";
    }
}
