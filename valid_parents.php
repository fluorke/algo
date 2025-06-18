<?php

function isValid($s) {
        if (strlen($s) % 2 != 0) {
            return false;
        }
        $pair = [
            ')' => '(',
            ']' => '[',
            '}' => '{'
        ];
        $valid = [];
        for ($i = 0; $i < strlen($s); $i++) {
            if ($s[$i] == '(' or $s[$i] == '[' or $s[$i] == '{') {
                $valid[] = $s[$i];
            } else {
                if (end($valid) == $pair[$s[$i]]) {
                    array_pop($valid);
                } else {
                    return false;
                }
            }
        }
        if ($valid) return false;
        return true;
    }

    echo isValid("((");