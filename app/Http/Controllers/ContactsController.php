<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;
use App\Group;

/**
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Contact;


class ContactsController extends Controller
{
    private $limit = 5;

    public function index(Request $request)
    {
        if ($group_id = ($request->get('group_id'))) {
            $contacts = Contact::where('group_id', $group_id)->paginate($this->limit);
        }
        else {
            $contacts = Contact::paginate($this->limit);
        }

    	return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view("contacts.create");
    }
}


**/


class ContactsController extends Controller
{
    //
    private $limit = 10 ;
    private $rules = [
    'name' => ['required'],
    'company' => ['required'],
    'email' => ['required','email'],
    'photo' => ['mimes:jpg,jpeg,png,gif,bmp']
    ];

    private $upload_dir = '/public/uploads' ;

    public function __construct()
    {
       // $this->middleware('auth');
        $this->upload_dir = base_path().'/'.$this->upload_dir ;
    }


    public function index(Request $request)
    {


        $contacts = Contact::where(function ($query) use ($request){
            if($group_id = ($request->get('group_id'))){
                $query->where('group_id' , $group_id);
            }

            if(($term = $request->get("term"))){
                $keyword = '%'.$term.'%';
                $query->orWhere("name" , 'LIKE' , $keyword );
                $query->orWhere("company" , 'LIKE' , $keyword );
                $query->orWhere("email" , 'LIKE' , $keyword );
            }
        })
            ->orderBy('id' , 'desc')
            ->paginate($this->limit);

       // $contacts = Contact::all();
        return view('contacts.index' , compact('contacts'));

    }

    public function autocomplete(Request $request)
    {
        if($request->ajax())
        {
            return Contact::select(['id','name as value'])->where(function($query)use($request){
                if(($term = $request->get("term"))){
                    $keyword = '%'.$term.'%';
                    $query->orWhere("name" , 'LIKE' , $keyword );
                    $query->orWhere("company" , 'LIKE' , $keyword );

                }
            })->orderBy('name' , 'asc')->take(3)->get();

        }

    }

    public function create()
    {

            $contact = new Contact();
            return view("contacts.create" , compact('contact'));
            
    }

    public function contacts(Request $request)
    {
        if ($group_id = ($request->get('group_id'))){
            $contacts = Contact::where('group_id', $group_id)->paginate(1);
        }
        else{
            $contacts = Contact::paginate(1);
         //   $groups = Group::all();
        }


        return view('contacts.index' , compact('contacts'));
    }

    public function groups()
    {
        $groups = Group::all();
        return view('contacts.group' , compact('groups'));

        if ($group_id = ($request->get('group_id'))){
            $groups = Group::where('id', $group_id)->paginate(1);
        }
        else{
            $groups = Group::paginate(1);
            //   $groups = Group::all();
        }


        return view('contacts.group' , compact('groups'));
    }

    public function store(Request $request)
    {


        $this->validate($request , $this->rules);

        $data = $this->getRequest($request);
        Contact::create($data);

        return redirect('contacts')->with('message','contact saved!');

        //die('contact saved!');

    }

    private function getRequest(Request $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')){

            $photo =  $request->file('photo');
            $fileName = $photo->getClientOriginalName();
            $destination = $this->upload_dir;
            $photo->move($destination , $fileName);
            $data = $request->all();
            $data['photo'] = $fileName ;

        }

        return $data ;
    }

    public function edit($id)
    {
        $contact = Contact::find($id);
        return view("contacts.edit" , compact('contact'));
    }

    public function update($id ,  Request $request)
    {


        $this->validate($request , $this->rules);

        $contacts = Contact::find($id);
        $oldPhoto = $contacts->photo ;
        $data = $this->getRequest($request);
        $contacts->update($data);

        if( $oldPhoto !== $contacts->photo ){
            $this->removePhoto($oldPhoto);
        }


        return redirect('contacts')->with('message','contact updated!');


    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();

        $this->removePhoto($contact->photo);

        return redirect('contacts')->with('message','contact deleted!');
    }

    private function removePhoto($photo)
    {
        if(! empty($photo))
        {
            $file_path = $this->upload_dir .'/'.$photo ;

            if(file_exists($file_path) ) unlink($file_path);
        }
    }


}
