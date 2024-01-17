<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dep;
use App\Models\Email;
use App\Models\User;
use DB;
use voku\helper\ASCII;


class ViewHomeController extends Controller
{
    public function index(Email $email,Dep $dep, User $user){
        return view('viewhome',[
            'emails' => $email->orderBy('id','asc')->paginate(20),
            'deps' => $dep->all(),
            'users' => $user->all(),
            'field'  => ''
        ]);
    }
    public function search(Request $request,Dep $dep, User $user,Email $email){
        $search = $request->search;
        $field = $request->field;
        if($field == 'name'){
            $keysearch = ASCII::to_ascii($request->search);
        }
        else{
            $keysearch =$request->search;
        }
        $emails = $email->where($field,'LIKE', '%' . $keysearch . '%')->paginate(20);
        return view('viewhome', ['emails' => $emails,
                                'deps' => $dep->all(),
                                'users' => $user->all(),
                                'field'  =>$field ,
                                'search' => $search]);
    }
    public function liveSearch(Request $request,Email $email)
    {
        if ($request->ajax()) {
            $output = '';
            $body = '';
            $page = '';
            $emails = $email->where('name', 'LIKE', '%' . $request->search . '%')->paginate(2);

            $deps = Dep::all();
            $users = User::all();
            if ($emails) {
                foreach ($emails as $key => $email) {
                    if($email->publish == 1){
                        if($email->skype){
                            $skype = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>';
                        }else{
                            $skype = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>' ;
                        }
                        if($email->zalo){
                            $zalo = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>';
                        }else{
                            $zalo = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>' ;
                        }
                        if($email->webchat){
                            $webchat = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>';
                        }else{
                            $webchat = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>' ;
                        }
                        if($email->line){
                            $line = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" checked disabled>';
                        }else{
                            $line = '<input type="checkbox" id="vehicle1" name="vehicle1" value="Bike" disabled>' ;
                        }
                        if(auth()->check())
                        {
                            $show = '<td><a href="' . route('emails.show',$email->id) . '"class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a></td>';
                        }
                        else{
                            $show = '';
                        }
                        if($deps)
                        foreach($deps as $dep){
                            if($dep->id == $email->dep_id){
                                $email_dep = $dep->name;
                            }
                        }if($email->dep_id == 0){
                            $email_dep = 'no';
                        }
                        if($users){
                        foreach($users as $user){
                            if($user->id == $email->role){
                                $email_login = $user->name;
                            }
                        }}
                        if($email->role == 0){
                            $email_login = 'no';
                        }
                        if($email->off_job == 0 && strtotime(date('Y-m-d H:i:s')) - strtotime($email->created_at)<= 2592000){
                            $color_table = 'table-info';
                        }
                        elseif($email->off_job == 1){
                            $color_table = 'table-danger';
                        }
                        else{
                            $color_table = '';
                        }
                        $body .= '<tr class="text-center '. $color_table .'">
                        <td scope="row">' . $key+1 . '</td>
                        <td>' . $email->pc_name . '</td>
                        <td>' . $email->name . '</td>
                        <td>' . $email->chinese_name . '</td>
                        <td>' . $email_dep . '</td>
                        <td>' . $email->email . '</td>
                        <td>' . $email->ip . '</td>
                        <td>' . $email_login . '</td>
                        <td>' . $skype . '</td>
                        <td>' . $zalo . '</td>
                        <td>' . $webchat . '</td>
                        <td>' . $line . '</td>
                        ' . $show . '
                        </tr>';
                    }
                    else{
                        $body .= '<tr class=""><td colspan="13">
                                        <span class="text-danger">
                                            <strong>No User Found!</strong>
                                        </span>
                                    </td></tr>';
                    }
                }
                $page = $emails->link();
            }
            if(!$body){
                $body .= '<tr class=""><td colspan="13">
                <span class="text-danger">
                    <strong>No User Found!</strong>
                </span>
                </td></tr>';
            }
            $output = [
                'body' => $body,
                'page' => $page
            ];
            return Response($output);
        }
    }
}
