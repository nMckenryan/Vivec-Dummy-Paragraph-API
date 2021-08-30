#VIVEC LESSON DUMMY DATA

##A simple API for getting Dummy Data for blogs etc. Contains the full canon of Vivec from Morrowind.

###Call Sermons from: https://pa6bmhahhc.execute-api.ap-southeast-2.amazonaws.com/api/sermons/

###Call individual sermon (out of 36) with https://pa6bmhahhc.execute-api.ap-southeast-2.amazonaws.com/api/sermons/{insert number Here}


######Sample Data:

{"id":41,"number":1,"contents":"He was born in the ash among the Velothi\\, anon Chimer\\, before the war with the northern men. Ayem came first to the village of the netchimen\\, and her shadow was that of Boethiah\\\\, who was the Prince of Plots\\, and things unknown and known would fold themselves around her until they were like stars or the messages of stars. Ayem took a netchiman\\'s wife and said\\ \\'I am the Face-Snaked Queen of the Three in One. In you is an image and a seven-syllable spell\\, AYEM AE SEHTI AE VEHK\\, which you will repeat to it until mystery comes.\\' Then Ayem threw the netchiman\\'s wife into the ocean water where dreughs took her into castles of glass and coral. They gifted the netchiman\\'s wife with gills and milk fingers\\, changing her sex so that she might give birth to the image as an egg. There she stayed for seven or eight months. Then Seht came to the netchiman\\'s wife and said: \\'I am the Clockwork King of the Three in One. In you is an egg of my brother-sister\\, who possesses invisible knowledge of words and swords\\, which you shall nurture until the Hortator comes.\\' And Seht then extended his hands and multitudes of homunculi came forth\\, each like a glimmering rope through the water\\, and they raised the netchiman\\'s wife back to the surface world and set her down on the shoals of Azura\\'s coast. There she lay for seven or eight more months\\, caring for the egg-knowledge by whispering to it the Codes of Mephala and the prophecies of Veloth and even the forbidden teachings of Trinimac. Seven Daedra came to her one night and each one gave to the egg new motions that could be achieved by certain movements of the bones. These are called the Barons of Move Like This. Then an eighth Daedroth came\\, and he was a Demiprince\\, called Fa-Nuit-Hen\\, or the Multiplier of Motions Known. And Fa-Nuit-Hen said: \\'Whom do you wait for?\\' To which the netchiman\\'s wife said the Hortator. \\'Go to the land of the Indoril in three months\\' time\\, for that is when war comes. I return now to haunt the warriors who fell and still wonder why. But first I show you this.\\' Then the Barons and the Demiprince joined together into a pillar of fighting styles terrible to behold and they danced before the egg and its learning image. \\'Look\\, little Vehk\\, and find the face behind the splendor of my bladed carriage\\, for in it is delivered the unmixed conflict path\\, perfect in every way. What is its number?\\' It is said the number is the number of birds that can nest in an ancient tibrol tree\\, less three grams of honest work\\, but Vivec in his later years found a better one and so gave this secret to his people. \\'For I have crushed a world with my left hand\\,\\' he will say\\, \\'but in my right hand is how it could have won against me. Love is under my will only.\\' The ending of the words is ALMSIVI","created_at":"2021-08-23T02:24:58.000000Z","updated_at":"2021-08-23T02:24:58.000000Z"}



STEPS TAKEN:

If issues occur, run php artisan cache:clear to refresh

1. Created Route in api.php with rudimentary JSON data (api/test to test the api connection)
2. went into .env and deleted all in the DB_ section, and replaced with solely  "DB_CONNECTION=sqlite"
3. Created Sermon Model via CLI: "php artisan make:model Sermon --migration"
4. Went into create_sermons_table model and filled in the key-value prototype for migration
5. Created database.sqlite in database folder. 
6. Opened database.sqlite in DB Browser and ran php artisan migrate, then check in DB browser that it went through 
7. Go into Sermon.php (in app\Models\Sermon.php) and instantiate $fillable array with the key/value data from the create_sermons_table file (sans id and timestamp)
8. In api.php, import that Sermon mode (make sure you use the Relative path. "use App\Models\Sermon;" ensure 'App' is Capitalised.
  Test the model by declaring the '/create' route in api.php (see file for details) Then use the browser to "http://[DEVELOPMENT PORT]/api/create
  Check the model was created with DBBrowser (go into browse Data tab and selected the 'sermons' from the dropdown)
9. Instantiate a Sermon controlelr with "php artisan make:controller SermonController --api". Open it in app\Http\Controllers\SermonController.php
10. Port into Controller by declaring "Route::resource('sermons', 'App\Http\Controllers\SermonController');" in api.php. 
    Check that it went through with the cli command: "php artisan route:list"
11. Write code for the store,show,update,destroy commands in the SermonController (see file for code. import sermons with 'use App\Models\Sermon;' first)
12. Open Insomnia and run a test http request for each of the controller actions. (use JSON data for update method to prevent conflicts)
    declare the header/value as "content-type" "application/json" respectively, then "Accept"/application/json (be sure to php artisan serve first to access the application)
13. To ensure 'number' is an in. declare a protected array in the Sermon.php. and declared 'number' => 'integer'.
    
    POPULATING THE DATABASE: 
1. Compiled JSON file with Vivec quotes in 
2. Follow tutorial to build seeder file (https://medium.com/@kolawrites/seed-me-some-json-data-how-laravel-makes-everything-a-piece-of-cake-b249ff81ecdc)
3. Run seeder with php artisan db:seed
 

PUBLISHING: 

1. Follow tutorial on Bref
2. Open generated link in console. 