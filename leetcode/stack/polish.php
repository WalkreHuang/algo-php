<?php
//https://leetcode-cn.com/problems/evaluate-reverse-polish-notation/

/**
 * @param String[] $polish
 * @return Integer
 */
function evalPRN($polish) {
    $len = count($polish);

    $numStack = [];
    for ($i=0;$i<$len;$i++) {
        switch ($polish[$i]) {
            case '+':
                $operator2 = array_pop($numStack);
                $operator1 = array_pop($numStack);
                $numStack[] = $operator1 + $operator2;
                break;
            case '-':
                $operator2 = array_pop($numStack);
                $operator1 = array_pop($numStack);
                $numStack[] = $operator1 - $operator2;
                break;
            case '*':
                $operator2 = array_pop($numStack);
                $operator1 = array_pop($numStack);
                $numStack[] = $operator1 * $operator2;
                break;
            case '/':
                $operator2 = array_pop($numStack);
                $operator1 = array_pop($numStack);
                $temp_ret = $operator1 / $operator2;
                $numStack[] = ($temp_ret >0) ? floor($temp_ret) : ceil($temp_ret);
                break;
            default:
                $numStack[] = (int) $polish[$i];
                break;
        }
    }

    return array_pop($numStack);
}

$nums = ["4","-2","/","2","-3","-","-"];
$ret = evalPRN($nums);
echo $ret;