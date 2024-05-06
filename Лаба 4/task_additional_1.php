<?php
class TableBuilder
{
    const METHOD_POST = "post";
    const METHOD_GET = "get";

    function __construct($method, $destination, $buttonText)
    {
        $this->method = $method;
        $this->destination = $destination;
        $this->buttonText = $buttonText;
    }

    function addTextField($textFieldName, $textFieldValue)
    {
        $this->textFieldName = $textFieldName;
        $this->textFieldValue = $textFieldValue;
    }


    function addRadioGroup($someName, $arr)
    {
        $this->someName = $someName;
        $this->arr = $arr;

    }

    function getForm()
    {
        echo "
        <html>
        <head>
            <title>Текст</title>
        </head>
        <body>
        ";

        echo "\t<form target=\"$this->destination\" method=\"$this->method\" > \n";
        echo "\t\t\t<input type='text' name = \"$this->textFieldName\"/> \n";

        echo "\t\t\t<table>\n";
        if(count($_POST) == 0){
            echo "\t\t\t\t<tr><td>Таблица пустая</td></tr>\n";
        }else{
            echo $_POST["SomeName"];
            if(mb_strlen($_POST["SomeName"]) >0 ) {
                $arr = explode(" ", $_POST["SomeName"]);

                foreach ($arr as $elem) {
                    echo "\t\t\t\t<tr><td>$elem</td></tr>\n";
                }
            }else{
                echo "\t\t\t\t<tr><td>массив пустой</td></tr>\n";
            }
        }

        echo "\t\t\t</table>\n";

//        foreach ($this->arr as $elem) {
//            echo "\t\t\t<input type='radio' name = \"$this->someName\"  value=\"$elem\" /> \n";
//        }
        echo "\t\t\t<input type='submit' value=\"$this->buttonText \" /> \n";
        echo "\t\t</form>\n";
        echo "\t</body>\n";
        echo "\t</html>\n";


    }

}
$a = new TableBuilder(TableBuilder::METHOD_POST, './destination.php', "Send!");
$a->addTextField("SomeName", "DeafultValue");
$a->addRadioGroup('SomeRadioname', ['A', 'B']);
$a->getForm();
echo "<div> массив пустой</div>";

var_dump($_POST);
//echo count($_POST["SomeName"]);