<?php

Route::resource('news', 'NewsController')
    ->only(['index', 'show']);

Route::get('/', function(){
   return redirect(route('news.index'));
});