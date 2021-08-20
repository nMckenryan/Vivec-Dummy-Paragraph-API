STEPS TAKEN:

If issues occur, run php artisan cache:clear to refresh

1. Created Route in api.php with rudimentary JSON data (api/test to test the api connection)
2. went into .env and deleted all in the DB_ section, and replaced with solely  "DB_CONNECTION=sqlite"
3. Created Sermon Model via CLI: "php artisan make:model Sermon --migration"
4. Went into create_sermons_table model and filled in the key-value prototype for migration
5. Created database.sqlite in database folder. 
6. Opened database.sqlite in DB Browser and ran php artisan migration, then check in DB browser that it went through 
7. Go into Sermon.php (in app\Models\Sermon.php) and instantiate $fillable array with the key/value data from the create_sermons_table file (sans id and timestamp)
8. In api.php, import that Sermon mode (make sure you use the Relative path. "use App\Models\Sermon;" ensure 'App' is Capitalised.
  Test the model by declaring the '/create' route in api.php (see file for details) Then use the browser to "http://[DEVELOPMENT PORT]/api/create
  Check the model was created with DBBrowser (go into browse Data tab and selected the 'sermons' from the dropdown)
9. Instantiate a Sermon controlelr with "php artisan make:controller SermonController --api". Open it in app\Http\Controllers\SermonController.php
10. Port into Controller by declaring "Route::resource('sermons', 'App\Http\Controllers\SermonController');" in api.php. 
    Check that it went through with the cli command: "php artisan route:list"
11. Write code for the store,show,update,destroy commands in the SermonController (see file for code. import sermons with 'use App\Models\Sermon;' first)
12. Open Insomnia and run a test http request for each of the controller actions. 
    declare the header/value as "content-type" "application/json" respectively, then "Accept"/application/json (be sure to php artisan serve first to access the application)
13. To ensure 'number' is an in. declare a protected array in the Sermon.php. and declared 'number' => 'integer'.