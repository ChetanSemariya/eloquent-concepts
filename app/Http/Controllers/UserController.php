<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplepaginate(4); // return all the records

        // $users = User::find([2,4],['name','email']); // it simply returns an object and only two column select, we can select two id also at a time 

        /* --- AGGREGATE METHODS --- */
        // $users = User::count(); // return no of records 
        // $users = User::min('age');
        // $users = User::max('age');
        // $users = User::sum('age');

        // $users = User::whereIn('city',['Ujjain','Dewas'])->get();
                    // whereNotIn('city',['ujjain','Dewas']);
                   // whereBetween('Age',[20,30])->get(); // it return a range i.e iss number k bich mai kitne records hai
                    //    whereNotBetween('Age',[20,30])->get(); 
                    //   ->where('city','ujjain')
                    //   ->where('age','<>', 20);
                    //   ->orWhere('age','>', 20)
                    //   ->ddRawSql(); return whole Query
                    //   ->dd(); return whole query and data but with encrypted form
                    // ->toRawSql();  // it return what sql query is run behind this code it simply return whole query
                    //   ->toSql();  // it return what sql query is run behind this code yhh query secure form mai dikhata hai
        // return $users;


        /* --- WE CAN ALSO WRITE THIS --- */
        // $users = User::where([
        //     ['city', 'ujjain'],
        //     ['age','>', 20]
        // ])->get();
        
        /* --- IN LATEST VERSION WE CAN SEARCH ALSO LIKE THIS --- */
        // $users = User::whereCity('ujjain')->get(); // column ka name where k sath mai hi likh skte hai but camelCase mai likhna padega 
        return view('home', compact('users'));

        /* --- RAW METHODS FOR ELOQUENT ORM --- */
        /*
            In query builder we can write query like this :-
            User::select('name','age')->get(); each column k liye comma lagana padh raha hai but with the help of raw method we can write like this :

            User::selectRaw('name,age,city')->get(); ek hi baar inverted comman lagana hai and jitne bhi col k name lene hai vo comma lagakr likh skte hai 
        */

        /* --- DETERMINING IF RECORD EXISTS --- */
        /*
            if(User::where('id',1)->exists()){
                //
            }

            if(User::where('id',1)->doesntExist()){
                //
            }
        */
        
    }

    // add user
    public function addUser(Request $request)
    {
        if($request->isMethod('post')){
            // $data = $request->all();
            // $user = new User;
            // $user->name = $request->username;
            // $user->email = $request->useremail;
            // $user->age = $request->userage;
            // $user->city = $request->usercity;            
            // $user->save();

            $request->validate([
                'username' => 'required|alpha',
                'useremail' => 'required|email',
                'userage' => 'required|numeric',
                'usercity' => 'required|alpha',
            ]);


            /* -- SAVE DATA WITH ELOQUENT METHOD --- */
            User::create([
                'name' => $request->username,
                'email'=> $request->useremail,
                'age'  => $request->userage,
                'city' => $request->usercity,  
            ]);

            /* ---------- FIRST OR CREATE METHOD ------------  */

            // User::firstOrCreate( // it takes 2 parameter phle param mai jo value hum lete hai use database mai search krta hai ki iss name se record exist hai ya nahi, agar hai or uska first data hume nkal kr de deta hai or nahi hai to phir create krdeta hai vo data jo hume second param mai liya hua hai.
            //     ['name' => "ram"],
            //     [
            //         'email' => 'ram@gmail.com',
            //         'age' => 13,
            //         'city' => 'Agra'
            //     ]
            //     );

            /* ----------- UPDATE OR CREATE METHOD ------------ */

            // User::updateOrCreate( // agar first param ka data database mai milta hai tab hi second param ka data update hoga and if first param ka data database mai nahi hai to create hojayga
            //     ['name'=>'ram', 'city' => 'delhi'], // first param find ka kaam krta hai
            //     [
            //         'email' => 'ram@gmail.com',  // second param update ka kaam krta hai
            //         'age' => 20
            //     ]
            //     );


            /* ----------- UPSERT METHOD ------------- */

            User::upsert( // same work as updateorCreate but diff is that it takes 3 parameter phle param mai updated data, second param mai unique column aayga jisse hum search krenge , and third param mai jis bhi column ka name likhenge only vahi update hoga. And agar email search krne pr record nahi milta hai to new user create hojayga 
                [
                    'name' => 'ram',
                    'email' => 'ram@gmail.com',
                    'age'   => 25,
                    'city'  => 'goa'
                ],
                ['email'], // find in unique column
                ['city'] // only vahi col jise update krna hai 
            );

            
            return redirect()->route('user.index')->with('status','New User Added Successfully');
        }

        return view('adduser');
    }

    // view user
    public function viewUser(Request $request, $id)
    {
        $user = User::findorfail($id); // findorfail hume error nahi deta hai 404 page return krta hai it is best than find method 
        return view('viewuser', compact('user'));

    }

    // edit user
    public function editUser(Request $request, $id)
    {
        $user = User::find($id);
        if($request->isMethod('post')){
            
            // $user->name = $request->username;
            // $user->email = $request->useremail;
            // $user->age = $request->userage;
            // $user->city = $request->usercity;            
            // $user->save();
            // return redirect()->route('user.index')->with('status','User Updated Successfully!');

            /* -- ELOQUENT METHOD UPDATE -- */
            $request->validate([
                'username' => 'required|alpha',
                'useremail' => 'required|email',
                'userage' => 'required|numeric',
                'usercity' => 'required|alpha',
            ]);

            $user = User::where('id', $id)
            ->update([
                'name' => $request->username,
                'email'=> $request->useremail,
                'age'  => $request->userage,
                'city' => $request->usercity, 
            ]);

             return redirect()->route('user.index')->with('status','User Updated Successfully!');
        }
        return view('updateuser',compact('user'));

    }

    // delete user
    public function destroy($id)
    {
        // $users = User::find($id);
        // $users->delete();

        /* -- WITH ELOQUENT FUNCTION -- */
        User::destroy($id);

        // User::truncate(); truncate all the data 
        return redirect()->route('user.index')->with('status','User Deleted Successfully!');
    }
}
/*
1). findOrFail :- yhh normal find ki tarah work nahi krta hai i.e it did not give error if id not exist it returns 404 page not found . otherwise find method give error if id not exists
2). Chunk :- Agar humare pass bulk mai data hai to use ek sath load hone mai bhut sari memory ka use hoga or humare server pr load badega . iss problem ko solve krne k liye hum eloquent k chunk method ka use krte hai jisme hum data ko chunk ke form mai leke aate hai ex- ek baar mai 50 ya 100 jisse memory pr load nahi padta hai or ek baar chunk load hone k baad memory ka space bhi free hojata hai .

Example: User::chunk(3, function($users){  we can also use where conditions here 
    foreach($users as $user){
        echo "$user->name \n";
    }
});

3). ChunkById :- Agar humare pass bulk mai data hai and hume use update krna chahte hai with the help of chuck to eloquent mai uske liye ek method aata hai chunkById

Example : User::where('city', 'Delhi')->chunkById(3, function($users){
                $users->each->update(['age'=>30]);
            });

4). Lazy :- Same work as chunk but difference is that yhh ek ek krke data leke aata hai and memory khali krte jata hai and yhh callback func ka bhi use nahi krta hai that's why it is slow than chunk. Lazy method mai hum multiple table se bhi data fetch krke la skte hai .

Example: foreach(User::lazy() as $user){
            echo "$user->name \n";
        }

5). lazyById :- same work as chunkById

Example : User::where('city', 'Delhi')->lazyById(3)->each->update(['age'=>40]);

6). Cursor : Working principle same as lazy method but difference is that isme hum multiple table se data fetch krke nahi la skte ek hi table se data fetch krskte hai.  

Example: foreach(User::cursor() as $user){
            echo "$user->name \n";
        }
*/