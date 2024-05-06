<?php
//mb_internal_encoding("utf8");

class CryptoManager
{

    const CESAR = "cesar";

    const ALPH = ['а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р',

        'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];

    public $type, $key;

    function __construct($types, $key)
    {
        $this->type = $types;
        $this->key = $key;

    }

    function encryption($PlainText)
    {
        $str = '';

        if ($this->type == CryptoManager::CESAR) {
            $i = 0;
            while ($i < mb_strlen($PlainText)) {
                $temp = mb_substr($PlainText, $i, 1);
                $flag = false;
                foreach (CryptoManager::ALPH as $let) {
                    if ($temp == $let) {
                        $flag = true;
                    }
                }
                if ($flag) {
                    $new_index = (array_search($temp, CryptoManager::ALPH) + 3) % 33;
                    $str .= CryptoManager::ALPH[$new_index];
                } else {
                    $str .= $temp;
                }
                $i += 1;
            }
        }

        echo "Зашифрованный текст: $str\n";
    }

    function decryption($CypheredText)
    {
        $str = '';

        if ($this->type == CryptoManager::CESAR) {

            $i = 0;
            while ($i < mb_strlen($CypheredText)) {
                $temp = mb_substr($CypheredText, $i, 1);
                $flag = false;
                foreach (CryptoManager::ALPH as $let) {
                    if ($temp == $let) {
                        $flag = true;
                    }
                }
                if ($flag) {
                    $new_index = (array_search($temp, CryptoManager::ALPH) - $this->key + 33) % 33;
                    $str .= CryptoManager::ALPH[$new_index];
                } else {
                    $str .= $temp;
                }
                $i += 1;
            }
        }
        echo "Расшифрованный текст: $str\n";

    }


}

$a = new CryptoManager(CryptoManager::CESAR, 3);
$a->encryption("съешь же ещё");
$a->decryption("фэзыя йз зьи");




