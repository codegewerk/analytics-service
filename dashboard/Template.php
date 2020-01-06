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
            <!DOCTYPE html>
            <html>
                <head>
                    <title>{$this->title}</title>
                </head>
                <body>
                    {$this->bodyContent}
                </body>
            </html>
        ";
    }
}
