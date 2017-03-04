<?php


//Проверяем какой тип аргументов передается и сверяем с требуемым.
function checkArg($arg, $type)
{
    if (gettype($arg) != $type)
    {
        die('Вы передали в функцию аргумент не того типа');
    }
    else
    {
        echo "Вы передали в функцию аргумент типа - $type" . '<br>';
        return true;
    }
}

//Проверяем тип данных в массиве
function checkArrayInSide($arg, $type, $type2 = null)
{
    static $i = 0;
    foreach ($arg as $val)
    {
        if (gettype($val) == $type || gettype($val) == $type2)
        {
            $i++;
        }
        else
        {
            die('Массив должен содержать только  - ' . $type);
        }
    }
    return $i;
}

//Проверяет, было ли передано правильное арефметическое действие
function checkMathChar($cha)
{
    switch ($cha)
    {
        case '-':
        case '+':
        case '/':
        case '*':
            return true;
            break;
        default:
            die ('Нет такого врефмитического действия, введите правильное (-, +, /, *)');
    }
}


//Задание №1 Функция должна принимать массив строк и выводить каждую строку в отдельном параграфе.

//
//function homeTask1($arg)
//{
//    if (checkArg($arg, 'array'))
//    {
//        if (checkArrayInSide($arg, 'string') == count($arg))
//        {
//            foreach ($arg as $val)
//            {
//                echo '<p>' . $val . '</p>';
//            }
//
//        }
//    }
//
//}
//
//$arr = Array('Петя', 'BMW', 'Ostrov', 'Lolwhat');
//homeTask1($arr);


//_____________________________________________________________________________________________________________


//Задание №2 Функция должна принимать 2 параметра:
// а) массив чисел;
// б) строку, обозначающую арифметическое действие, которое нужно выполнить со всеми элементами массива.
// Функция должна вывести результат.
// Например: имя функции someFunction(array(1,2,3,4), ‘ – ’)
// Результат: 1 – 2 – 3 – 4 = -8


//$myArr = [1, 2, 3, 4];
//
//function homeTask2($arg, $cha)
//{
//    if (checkArg($arg, 'array') && checkMathChar($cha))
//    {
//        if (checkArrayInSide($arg, 'integer') == count($arg))
//        {
//
//            $x = 0;
//            foreach ($arg as $ar => $val)
//            {
//                if ($ar == 0)
//                {
//                    $x = $val;
//                    continue;
//                }
//                else
//                {
//                    switch ($cha)
//                    {
//                        case '-':
//                            $x = $x - $val;
//                            break;
//
//                        case '+':
//                            $x = $x + $val;
//                            break;
//                        case '/':
//                            $x = $x / $val;
//                            break;
//                        case '*':
//                            $x = $x * $val;
//                            break;
//                        default:
//                            die ('Нет такого врефмитического действия, введите правильное (-, +, /, *)');
//                    }
//                }
//            }
//            echo join($cha, $arg) . '=' . $x;
//        }
//    }
//}
//
//homeTask2($myArr, '-');


//______________________________________________________________________________________________________________


//Задание №3
// Функция должна принимать переменное число аргументов,
// но первым аргументом обязательно должна быть строка,
// обозначающая арифметическое действие, которое необходимо выполнить со всеми передаваемыми аргументами.
// Остальные аргументы целые и/или вещественные.
// Например: имя функции someFunction(‘+’, 1, 2, 3, 5.2);
// Результат: 1 + 2 + 3 + 5.2 = 11.2
//

function homeTask3()
{
    if (checkArg(func_get_args(), "array"))
    {
        $myArr = func_get_args();
        if (checkMathChar(func_get_arg(0)))
        {
            unset($myArr[0]);
            if (checkArrayInSide($myArr, 'integer', 'double'))
            {
                $x = 0;
                foreach ($myArr as $ar => $val)
                {
                    if ($ar == 0)
                    {
                        $x = $val;
                        continue;
                    }
                    else
                    {
                        switch (func_get_arg(0))
                        {
                            case '-':
                                $x = $x - $val;
                                break;

                            case '+':
                                $x = $x + $val;
                                break;
                            case '/':
                                $x = $x / $val;
                                break;
                            case '*':
                                $x = $x * $val;
                                break;
                            default:
                                die ('Нет такого врефмитического действия, введите правильное (-, +, /, *)');
                        }
                    }
                }
                echo join(func_get_arg(0), $myArr) . '=' . $x;
            }
        }
    }
}
homeTask3('+', 1, 2, 3, 5.2);

