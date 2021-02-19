<?php

namespace Classes;

class ClassLayout
{

    #setar as tags do Head
    public static function setHead($title, $description, $author = "Rodolfo")
    {

        $html_5 = "  <!DOCTYPE html>\n";
        $html_5 .= "  <html lang='pt-br'>\n";
        $html_5 .= "  <head>\n";
        $html_5 .= "  <meta charset='UTF-8'>\n";
        $html_5 .= "  <meta http-equiv='X-UA-Compatible' content='IE=edge'>\n";
        $html_5 .= "  <meta name='viewport' content='width=device-width, initial-scale=1.0'>\n";
        $html_5 .= "  <meta name='author' content='$author'>\n";
        $html_5 .= "  <meta name='format-detection' content='telephone-no'>\n";
        $html_5 .= "  <meta name='description' content='$description'>\n";
        $html_5 .= "  <title>$title</title>\n";

        #FAV ICON
        $html_5 .= "  <link rel='stylesheet' href='" . DIRPAGE . "lib/css/style.css'>\n";
        #http://localhost/login_amuba/....

        $html_5 .= "  </head>\n";
        $html_5 .= "  <body>\n";

        echo $html_5;
    }

    #setar as tags do footer
    public static function setFooter()
    {
        $html_5  = "<script src='" . DIRPAGE . "lib/js/zepto.min.js'></script>\n";
        $html_5 .= "<script src='" . DIRPAGE . "lib/js/vanilla-masker.min.js'></script>\n";
        $html_5 .= "<script src='https://www.google.com/recaptcha/api.js?render=" . SITEKEY . "'></script>\n";
        $html_5 .= "<script src='" . DIRPAGE . "lib/js/javascript.js'></script>\n";
        $html_5 .= "  </body>\n";
        $html_5 .= "  </html>\n";
        #<!--JAVA/JQUERY-->
        echo $html_5;
    }
}
