# u04-todo-app-johanneslepsius

## SQL to make the project work
i exported the database instructions to the todolist.sql file

## planning the project

## SQL
skapa databas
skapa tabell för tasks med
id auto incr
title 
tasktext 
completed (bit?)    -> kan ta emot true/false   default 0

skapa usertabell
user id auto incr primary
mailadress unique
password

## PHP
koppla databas med pdo
skapa form med titel o text input & submit knapp som kan ha value, måste inte

skickar vidare tills själv 
action     htmlspecialchars($_SERVER['PHP_SELF'])

post array
spara titel o text i varsin variabel
$query  "insert into uppgifter (titel, text) values (:titel, :text)";
$stmnt = $pdo->prepare($query);
if ($stmnt->execute(["titel"=>$titel, "text"=>$text])) {
    blah
};


hämtar alla uppgifter från databasen
lägg i body
$query = "select * from uppgifter";
$result = $pdo->query($query)->fetchAll();

var_dump($result);

foreach ngnstans

visa uppgifterna som form, med uppgiftstext som default value i input, id som gömt value med save & delete button
save & delete button är submit buttons

funktion för att ta bort uppgift från databas


## Överkurs


session_start
password hash
password_verify
