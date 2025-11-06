<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");

// Superheroes array
$superheroes = [
    [
        "name" => "Steve Rogers",
        "alias" => "Captain America",
        "biography" =>
        "Recipient of the Super-Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world’s mightiest heroes and the leader of the Avengers.",
    ],
    [
        "name" => "Tony Stark",
        "alias" => "Ironman",
        "biography" =>
        "Genius. Billionaire. Playboy. Philanthropist. Tony Stark's confidence is only matched by his high-flying abilities as the hero called Iron Man.",
    ],
    [
        "name" => "Peter Parker",
        "alias" => "Spiderman",
        "biography" =>
        "Bitten by a radioactive spider, Peter Parker’s arachnid abilities give him amazing powers which he uses to help others.",
    ],
    [
        "name" => "Carol Danvers",
        "alias" => "Captain Marvel",
        "biography" =>
        "Carol Danvers becomes one of the universe's most powerful heroes when Earth is caught in a galactic war.",
    ],
    [
        "name" => "Natasha Romanov",
        "alias" => "Black Widow",
        "biography" =>
        "A super spy and assassin who’s become one of S.H.I.E.L.D.'s most deadly agents and an Avenger.",
    ],
    [
        "name" => "Bruce Banner",
        "alias" => "Hulk",
        "biography" =>
        "A scientist who transforms into a powerful green creature when angry.",
    ],
    [
        "name" => "Clint Barton",
        "alias" => "Hawkeye",
        "biography" =>
        "A master marksman and longtime Avenger who never misses a shot.",
    ],
    [
        "name" => "T'challa",
        "alias" => "Black Panther",
        "biography" =>
        "King of Wakanda, a technologically advanced African nation and home of vibranium.",
    ],
    [
        "name" => "Thor Odinson",
        "alias" => "Thor",
        "biography" =>
        "The Norse god of thunder who wields the enchanted hammer Mjolnir.",
    ],
    [
        "name" => "Wanda Maximoff",
        "alias" => "Scarlett Witch",
        "biography" =>
        "A mutant with reality-warping powers, once both foe and ally of the Avengers.",
    ],
];

$query = filter_input(INPUT_GET, "query", FILTER_SANITIZE_STRING);

if ($query) {
    $found = false;

    foreach ($superheroes as $hero) {
        if (
            strcasecmp($hero["alias"], $query) === 0 ||
            strcasecmp($hero["name"], $query) === 0
        ) {
            echo "<h3>" . htmlspecialchars($hero["alias"]) . "</h3>";
            echo "<h4>" . htmlspecialchars($hero["name"]) . "</h4>";
            echo "<p>" . htmlspecialchars($hero["biography"]) . "</p>";
            $found = true;
            break;
        }
    }

    if (!$found) {
        echo "<p>Superhero not found</p>";
    }
} else {
    echo "<ul>";
    foreach ($superheroes as $hero) {
        echo "<li>" . htmlspecialchars($hero["alias"]) . "</li>";
    }
    echo "</ul>";
}
?>