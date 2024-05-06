<?php

class FormBuilder
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
        foreach ($this->arr as $elem) {
            echo "\t\t\t<input type='radio' name = \"$this->someName\"  value=\"$elem\" /> \n";
        }
        echo "\t\t\t<input type='submit' value=\"$this->buttonText \" /> \n";
        echo "\t\t</form>\n";
        echo "\t</body>\n";
        echo "\t</html>\n";


    }

}


class SafeFormBuilder extends FormBuilder
{
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
        echo "\t\t\t<input type='text' name = \"$this->textFieldName\" value=\"$this->textFieldValue\"/> \n";
        foreach ($this->arr as $elem) {
            echo "\t\t\t<input type='radio' name = \"$this->someName\"  value=\"$elem\" /> \n";
        }
        echo "\t\t\t<input type='submit' value=\"$this->buttonText \" /> \n";
        echo "\t\t</form>\n";
        echo "\t</body>\n";
        echo "\t</html>\n";


    }
}

if (count($_POST) > 0) {
    if ($_POST['SomeName'] == '') {
        $a = new FormBuilder(FormBuilder::METHOD_POST, './destination.php', "Send!");
        $a->addTextField("SomeName", "DeafultValue");
        $a->addRadioGroup('SomeRadioname', ['A', 'B']);
        $a->getForm();
        echo "<div> массив пустой</div>";

    } else {
        $a = new SafeFormBuilder(FormBuilder::METHOD_POST, './destination.php', "Send!");
        $a->addTextField("SomeName", $_POST['SomeName']);
        $a->addRadioGroup('SomeRadioname', ['A', 'B']);
        $a->getForm();

        var_dump($_POST);
    }

} else {
    $a = new FormBuilder(FormBuilder::METHOD_POST, './destination.php', "Send!");
    $a->addTextField("SomeName", "DeafultValue");
    $a->addRadioGroup('SomeRadioname', ['A', 'B']);
    $a->getForm();
    echo "<div> массив пустой</div>";


}


//echo "\n$a->method  - $a->destination - $a->buttonText";
