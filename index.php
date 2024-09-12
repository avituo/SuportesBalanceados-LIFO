<?php

function suportesBalanceados($str) {
    $map = array(
        ')' => '(',
        '}' => '{',
        ']' => '['
    );

    $stack = array();

    for ($i = 0; $i < strlen($str); $i++) {
        $char = $str[$i];

        if (in_array($char, $map)) {
            $stack[] = $char;
        } else if (isset($map[$char])) {
            if (empty($stack) || array_pop($stack) != $map[$char]) {
                return false;
            }
        }
    }

    return empty($stack);
}

//EXEMPLOS
var_dump(suportesBalanceados("(){}[]"));
var_dump(suportesBalanceados("[{()}](){}"));
var_dump(suportesBalanceados("[]{()"));
var_dump(suportesBalanceados("[{)]"));
