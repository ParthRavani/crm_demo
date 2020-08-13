<?php

function isEmpty($Data, $checkArrayCount = true)
{
    if ($Data === null)
        return true;
    if (gettype($Data) == 'string') {
        if (trim($Data) == "") {
            return true;
        } elseif (trim($Data) == 'NULL') {
            return true;
        }
    } elseif (gettype($Data) == 'int') {
        return !isset($Data);
    } elseif (gettype($Data) == 'array') {
        if ($checkArrayCount) {
            if (isset($Data) == 1 && count($Data) == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
    return false;
}
