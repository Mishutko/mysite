<?php

try
{
    $db = new PDO('mysql:host=localhost;dbname=mydb','root','');
}
catch(PDOException $e)
{
    die("Error: ".$e->getMessage());
}

/*
$db->exec("CREATE TABLE users (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(20),
            age INT(10)
)");

*/


/*//Добавляем запись в ДБ
$name = "Miha";
$age = 30;
$stmt = $db->prepare("INSERT INTO users(name, age) VALUES(:name, :age)");
$stmt->bindParam(':name', $name);
$stmt->bindParam(':age', $age);
$stmt->execute();*/

//Выборка из ДБ
$stmt = $db->query("SELECT * FROM users");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
while($row = $stmt->fetch())
{
    echo "Имя - ".$row['name'].", возраст - ".$row['age']."<br>";
}
