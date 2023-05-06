<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function login()
    {
        $title = [
            "Mayon Volcano",
            "Chocolate Hills",
            "Banaue Rice Terraces",
            "Intramuros",
            "Boracay Island",
            "Magellan's Cross"
        ];
        $description = [
            'Mayon, also known as Mount Mayon and Mayon Volcano, is an active stratovolcano in the province of Albay in Bicol, Philippines. A popular tourist spot, it is renowned for its "perfect cone" because of its symmetric conical shape, and is regarded as very sacred in Philippine mythology.',
            'The Chocolate Hills are a geological formation in the Bohol province of the Philippines. There are at least 1,260 hills, but there may be as many as 1,776 hills spread over an area of more than 50 square kilometers. They are covered in green grass that turns brown during the dry season, hence the name.',
            "Boracay is a small island in the central Philippines. It's known for its resorts and beaches. Along the west coast, White Beach is backed by palm trees, bars and restaurants. On the east coast, strong winds make Bulabog Beach a hub for water sports. Nearby, the observation deck on Mount Luho offers panoramic views over the island. Offshore, coral reefs and shipwrecks are home to diverse marine life.",
            'The Banaue Rice Terraces are terraces that were carved into the mountains of Banaue, Ifugao, in the Philippines, by the ancestors of the Igorot people. The terraces are occasionally called the "Eighth Wonder of the World". It is commonly thought that the terraces were built with minimal equipment, largely by hand. The terraces are located approximately 1,500 metres (4,900 feet) above sea level. These are fed by an ancient irrigation system from the rainforests above the terraces. It is said that if the steps were put end to end, it would encircle half of the globe.',
            'Old-world Intramuros is home to Spanish-era landmarks like Fort Santiago, with a large stone gate and a shrine to national hero José Rizal. The ornate Manila Cathedral houses bronze carvings and stained glass windows, while the San Agustin Church museum has religious artwork and statues. Spanish colonial furniture and art fill Casa Manila museum, and horse-drawn carriages (kalesa) ply the area’s cobblestone streets.',
            "Magellan's Cross Pavilion is a stone kiosk in Cebu City, Philippines. The structure is situated on Plaza Sugbo beside the Basilica del Santo Niño. It houses a Christian cross that was planted by explorers of the Spanish expedition of the first circumnavigation of the world, led by Ferdinand Magellan, upon arriving in Cebu in the Philippines on April 21, 1521.",
        ];
        $image = [
            [
                "picture" => "mayon-volcano.jpg",
                "taken_by" => "Rafael Loreto",
            ],
            [
                "picture" => "chocolate-hills.jpg",
                "taken_by" => "Zed Benson",
            ],
            [
                "picture" => "rice-terraces.jpg",
                "taken_by" => "AR",
            ],
            [
                "picture" => "intramuros.jpg",
                "taken_by" => "Gerald Escamos",
            ],
            [
                "picture" => "boracay.jpg",
                "taken_by" => "C Rayban",
            ],
            [
                "picture" => "magellans-cross.jpg",
                "taken_by" => "Bei Ayson",
            ],
        ];

        return view("login")->with(['title' => $title[array_rand($title)], 'description' => $description[array_rand($description)], 'image' => $image[array_rand($image)]]);
    }

    public function register()
    {
        $title = [
            "Mayon Volcano",
            "Chocolate Hills",
            "Banaue Rice Terraces",
            "Intramuros",
            "Boracay Island",
            "Magellan's Cross"
        ];
        $description = [
            'Mayon, also known as Mount Mayon and Mayon Volcano, is an active stratovolcano in the province of Albay in Bicol, Philippines. A popular tourist spot, it is renowned for its "perfect cone" because of its symmetric conical shape, and is regarded as very sacred in Philippine mythology.',
            'The Chocolate Hills are a geological formation in the Bohol province of the Philippines. There are at least 1,260 hills, but there may be as many as 1,776 hills spread over an area of more than 50 square kilometers. They are covered in green grass that turns brown during the dry season, hence the name.',
            "Boracay is a small island in the central Philippines. It's known for its resorts and beaches. Along the west coast, White Beach is backed by palm trees, bars and restaurants. On the east coast, strong winds make Bulabog Beach a hub for water sports. Nearby, the observation deck on Mount Luho offers panoramic views over the island. Offshore, coral reefs and shipwrecks are home to diverse marine life.",
            'The Banaue Rice Terraces are terraces that were carved into the mountains of Banaue, Ifugao, in the Philippines, by the ancestors of the Igorot people. The terraces are occasionally called the "Eighth Wonder of the World". It is commonly thought that the terraces were built with minimal equipment, largely by hand. The terraces are located approximately 1,500 metres (4,900 feet) above sea level. These are fed by an ancient irrigation system from the rainforests above the terraces. It is said that if the steps were put end to end, it would encircle half of the globe.',
            'Old-world Intramuros is home to Spanish-era landmarks like Fort Santiago, with a large stone gate and a shrine to national hero José Rizal. The ornate Manila Cathedral houses bronze carvings and stained glass windows, while the San Agustin Church museum has religious artwork and statues. Spanish colonial furniture and art fill Casa Manila museum, and horse-drawn carriages (kalesa) ply the area’s cobblestone streets.',
            "Magellan's Cross Pavilion is a stone kiosk in Cebu City, Philippines. The structure is situated on Plaza Sugbo beside the Basilica del Santo Niño. It houses a Christian cross that was planted by explorers of the Spanish expedition of the first circumnavigation of the world, led by Ferdinand Magellan, upon arriving in Cebu in the Philippines on April 21, 1521.",
        ];
        $image = [
            [
                "picture" => "mayon-volcano.jpg",
                "taken_by" => "Rafael Loreto",
            ],
            [
                "picture" => "chocolate-hills.jpg",
                "taken_by" => "Zed Benson",
            ],
            [
                "picture" => "rice-terraces.jpg",
                "taken_by" => "AR",
            ],
            [
                "picture" => "intramuros.jpg",
                "taken_by" => "Gerald Escamos",
            ],
            [
                "picture" => "boracay.jpg",
                "taken_by" => "C Rayban",
            ],
            [
                "picture" => "magellans-cross.jpg",
                "taken_by" => "Bei Ayson",
            ],
        ];

        return view("register")->with(['title' => $title[array_rand($title)], 'description' => $description[array_rand($description)], 'image' => $image[array_rand($image)]]);
    }

    public function verifyEmailAddress()
    {
        $title = [
            "Mayon Volcano",
            "Chocolate Hills",
            "Banaue Rice Terraces",
            "Intramuros",
            "Boracay Island",
            "Magellan's Cross"
        ];
        $description = [
            'Mayon, also known as Mount Mayon and Mayon Volcano, is an active stratovolcano in the province of Albay in Bicol, Philippines. A popular tourist spot, it is renowned for its "perfect cone" because of its symmetric conical shape, and is regarded as very sacred in Philippine mythology.',
            'The Chocolate Hills are a geological formation in the Bohol province of the Philippines. There are at least 1,260 hills, but there may be as many as 1,776 hills spread over an area of more than 50 square kilometers. They are covered in green grass that turns brown during the dry season, hence the name.',
            "Boracay is a small island in the central Philippines. It's known for its resorts and beaches. Along the west coast, White Beach is backed by palm trees, bars and restaurants. On the east coast, strong winds make Bulabog Beach a hub for water sports. Nearby, the observation deck on Mount Luho offers panoramic views over the island. Offshore, coral reefs and shipwrecks are home to diverse marine life.",
            'The Banaue Rice Terraces are terraces that were carved into the mountains of Banaue, Ifugao, in the Philippines, by the ancestors of the Igorot people. The terraces are occasionally called the "Eighth Wonder of the World". It is commonly thought that the terraces were built with minimal equipment, largely by hand. The terraces are located approximately 1,500 metres (4,900 feet) above sea level. These are fed by an ancient irrigation system from the rainforests above the terraces. It is said that if the steps were put end to end, it would encircle half of the globe.',
            'Old-world Intramuros is home to Spanish-era landmarks like Fort Santiago, with a large stone gate and a shrine to national hero José Rizal. The ornate Manila Cathedral houses bronze carvings and stained glass windows, while the San Agustin Church museum has religious artwork and statues. Spanish colonial furniture and art fill Casa Manila museum, and horse-drawn carriages (kalesa) ply the area’s cobblestone streets.',
            "Magellan's Cross Pavilion is a stone kiosk in Cebu City, Philippines. The structure is situated on Plaza Sugbo beside the Basilica del Santo Niño. It houses a Christian cross that was planted by explorers of the Spanish expedition of the first circumnavigation of the world, led by Ferdinand Magellan, upon arriving in Cebu in the Philippines on April 21, 1521.",
        ];
        $image = [
            [
                "picture" => "mayon-volcano.jpg",
                "taken_by" => "Rafael Loreto",
            ],
            [
                "picture" => "chocolate-hills.jpg",
                "taken_by" => "Zed Benson",
            ],
            [
                "picture" => "rice-terraces.jpg",
                "taken_by" => "AR",
            ],
            [
                "picture" => "intramuros.jpg",
                "taken_by" => "Gerald Escamos",
            ],
            [
                "picture" => "boracay.jpg",
                "taken_by" => "C Rayban",
            ],
            [
                "picture" => "magellans-cross.jpg",
                "taken_by" => "Bei Ayson",
            ],
        ];

        return view('auth.verify-email')->with(['title' => $title[array_rand($title)], 'description' => $description[array_rand($description)], 'image' => $image[array_rand($image)]]);
    }

    public function profile($username)
    {
        $user = User::where("username", $username)->first();
        if (!$user == null) {
            return view("profile")->with(["user" => $user]);
        }
        return abort(404);
    }

    public function home()
    {
        return view('home');
    }
}
