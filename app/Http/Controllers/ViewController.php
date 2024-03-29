<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $others = User::where('id', '!=', Auth::user()->id)->inRandomOrder()->limit(5)->get();
        $user = User::with('posts')->where("username", $username)->first();

        if ($user != null) {
            $posts = Post::with('user')->where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(20);

            if (request()->ajax()) {
                $view = view('profile-data')->with(['posts' => $posts])->render();
                return response()->json(['data' => $view]);
            }
        }

        if (!$user == null) {
            return view("profile")->with(["user" => $user, 'others' => $others, 'posts' => $posts]);
        }
        return abort(404);
    }

    public function home()
    {
        $others = User::where('id', '!=', Auth::user()->id)->inRandomOrder()->limit(5)->get();
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(5);
        if (request()->ajax()) {
            $view = view('home-data')->with(['posts' => $posts])->render();
            return response()->json(['data' => $view]);
        }
        return view('home')->with(['posts' => $posts, 'others' => $others]);
    }

    public function settings()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('settings')->with(['user' => $user]);
    }

    public function about()
    {
        return view("about");
    }

    public function bryan()
    {
        if (Auth::user()->id == 100000000007) {
            return view("messages.bryan");
        }
        return abort(404);
    }

    public function sachi()
    {
        if (Auth::user()->id == 100000000007) {
            return view("messages.sachi");
        }
        return abort(404);
    }

    public function vincent()
    {
        if (Auth::user()->id == 100000000007) {
            return view("messages.vincent");
        }
        return abort(404);
    }

    public function lex()
    {
        if (Auth::user()->id == 100000000007) {
            return view("messages.lex");
        }
        return abort(404);
    }

    public function chi()
    {
        if (Auth::user()->id == 100000000007) {
            return view("messages.chi");
        }
        return abort(404);
    }
}
