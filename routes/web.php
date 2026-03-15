<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
    });
});

require __DIR__.'/settings.php';


// // testing route 
// Route::get('/collection', function () {
//     $arr1 = [1, 2, 3];
//     $arr2 = [3, 4, 5, 6];
    
//     // map 
//     $squared = collect($arr1)->map(function($item){
//         return $item * $item;
//     });

//     // filter
//     $users = collect([
//         ['name' => 'datt' , 'age' => 25],
//         ['name' => 'davin' , 'age' => 30],
//         ['name' => 'devid' , 'age' => 40],
//         ['name' => 'devil' , 'age' => 40],
//         ['name' => 'a' , 'age' => 1],
//         ['name' => 'b' , 'age' => 2],
//         ['name' => 'c' , 'age' => 3],
//         ['name' => 'd' , 'age' => 4],
//         ['name' => 'e' , 'age' => 5],
//         ['name' => 'f' , 'age' => 6],
//         ['name' => 'g' , 'age' => 7],
//         ['name' => 'h' , 'age' => 8],
//         ['name' => 'i' , 'age' => 9],
//         ['name' => 'j' , 'age' => 10],
//         ['name' => 'k' , 'age' => 11],
//         ['name' => 'l' , 'age' => 12],
//         ['name' => 'm' , 'age' => 13],
//         ['name' => 'n' , 'age' => 14],
//         ['name' => 'o' , 'age' => 15],
//         ['name' => 'p' , 'age' => 16],
//         ['name' => 'q' , 'age' => 17],
//         ['name' => 'r' , 'age' => 18],
//         ['name' => 's' , 'age' => 19],
//         ['name' => 't' , 'age' => 20],
//         ['name' => 'u' , 'age' => 21],
//         ['name' => 'v' , 'age' => 22],
//         ['name' => 'w' , 'age' => 23],
//         ['name' => 'x' , 'age' => 24],
//         ['name' => 'y' , 'age' => 25],
//         ['name' => 'z' , 'age' => 26],
//     ]);

//     // $filltered = $users->filter(function($item) {
//     //     return $item['age'] > 30;
//     // });

//     // groupBy
//     // $groupByAge = $users->groupBy('age');

//     // sort
//     // $ordered = collect([4,3,5,2,6,1,6,5])->sortDesc();

//     //merged 
//     // $merged = collect($arr1)->merge($arr2);

//     // concate
//     // $concated = collect($arr1)->concat($arr2);

//     // combine
//     // $key = ["name" , "age", "gender"];
//     // $value = ["datt" , 25, "male"];

//     // $combined = collect($key)->combine($value);

//     // join 
//     // $list = ["apple", "banana", "orange"];
//     // $joined = collect($list)->join(',');

   
//     $filltered = $users->lazy()->tapEach(function($item){
//         // dd($item);
//     })->filter(function($item) {
//         return $item['age'] > 30;
//     })->take(2);

//     dd($filltered);
// });

// testing the permission 
Route::get('test',function(){
    // $hasPermission =  auth()->user()->hasPermissionTo('access_users', 'web');
//    return $hasPermission ? 'User has permission' : 'User does not have permission';

//    return  $this->authorize('access_users');

});