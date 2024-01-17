<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dep;
use App\Models\Email;
use App\Models\User;
use App\Models\PcName;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\UpdateEmailRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use voku\helper\ASCII;

class AdminEmailController extends Controller
{
    /**
     * Instantiate a new Email instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-email|edit-email|delete-email|show-email', ['only' => ['index','show']]);
       $this->middleware('permission:show-email', ['only' => ['show']]);
       $this->middleware('permission:create-email', ['only' => ['create','store']]);
       $this->middleware('permission:edit-email', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-email', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.emails.index', [
            'emails' => Email::latest()->paginate(20),
            'field' => 'name'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.emails.create',['deps' => Dep::all(), 'users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmailRequest $request)
    {
        Email::create($request->all());
        return redirect()->route('emails.index')
                ->withSuccess('New Email is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Email $email,Dep $dep, User $user)
    {
        return view('admin.emails.show', [
            'email' => $email,
            'deps' => $dep->all(),
            'users' => $user->all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email,Dep $dep,User $user)
    {
        return view('admin.emails.edit', [
            'email' => $email,
            'deps' => $dep->all(),
            'users' => $user->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmailRequest $request, Email $email)
    {
        $data = [
            'pc_name' => $request->pc_name,
            'name' => $request->name,
            'chinese_name' => $request->chinese_name,
            'dep_id' => $request->dep_id,
            'email' => $request->email,
            'ip' => $request->ip,
            'role' => $request->role,
            'skype' => $request->skype,
            'zalo' => $request->zalo,
            'webchat' => $request->webchat,
            'line' => $request->line,
            'publish' => $request->publish,
            'off_job' => $request->off_job?"1":"0",
        ];
        $email->update($data);
        return redirect()->back()
                ->withSuccess('Email is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return redirect()->route('emails.index')
                ->withSuccess('Email is deleted successfully.');
    }

    public function updateStatus(){
        $data = request()->all();
        $email = Email::find($data['id']);
        if($data['name'] == 'publish') {
            $data = (['publish' => $data['value']]);
        }
        $email->update($data);
        return response($email);
    }

    public function searchEmail(Request $request){
        $search = $request->search;
        $field = $request->field;
        if($field == 'name'){
            $keysearch = ASCII::to_ascii($request->search);
        }
        else{
            $keysearch =$request->search;
        }
        $emails = Email::where($field, 'like', '%' . $keysearch . '%')->paginate(20);
        return view('admin.emails.index', ['emails' => $emails,
                                            'field'    =>$field ,
                                            'search' => $search]);
    }
    public function searchPcname(Request $request){
        if ($request->ajax()) {
            $output = '';
            $pcname = PcName::where('network_name',$request->search)->get();
            if(isset($pcname)){
                $output = $pcname;
            }else{
                $output = '';
            }
            return Response($output);
        }
    }
    public function searchIp(Request $request){
        if ($request->ajax()) {
            $output = '';
            $pcname = PcName::where('ip_address',$request->search)->get();
            if(isset($pcname)){
                $output = $pcname;
            }else{
                $output = '';
            }
            return Response($output);
        }
    }
}
