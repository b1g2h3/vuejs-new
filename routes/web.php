<?php

// Route::get('category', 'AppCOntroller@loadCategory');
Route::get('/{any}', 'AppController@show')->where('any', '.*');
