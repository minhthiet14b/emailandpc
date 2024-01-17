<?php

namespace App\Http\Controllers;

use App\Models\PCName;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PcNameImport; // Import class PcNameImport
use App\Http\Requests\StorePcNameRequest;
use App\Http\Requests\UpdatePcNameRequest;
use App\Exports\PcNameExport;

class PcNameController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-pcname|edit-pcname|delete-pcname|import_pcname|export_pcname', ['only' => ['index','show']]);
       $this->middleware('permission:import_pcname', ['only' => ['addImport','import']]);
       $this->middleware('permission:export_pcname', ['only' => ['export']]);
       $this->middleware('permission:create-pcname', ['only' => ['create','store']]);
       $this->middleware('permission:edit-pcname', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-pcname', ['only' => ['delete']]);
    }
    public function index(){
        return view('admin.pcname.index',[
            'pcnames' => PcName::latest()->orderBy('network_name', 'ASC')->paginate(20),
            'field' => 'network_name'
        ]);
    }
    public function show($id){
       $pcname = PcName::find($id)->first();
       return view('admin.pcname.show',[
            'pcname' => $pcname,
       ]);
    }
    public function addImport(){
        return view('admin.pcname.import');
    }
    public function import(Request $request){
        $file = $request->file('excel_file');
        // Sử dụng class import để xử lý việc nhập
        Excel::import(new PcNameImport, $file);

        return redirect()->back()->with('success', 'Data imported successfully.');
    }
    public function export(){
        return Excel::download(new PcNameExport, 'mau-pc.xlsx');
    }
    public function create(){
        return view('admin.pcname.create');
    }
    public function store(StorePcNameRequest $request){
        $data = [
            'network_name' => $request->network_name,
            'ip_address'=> $request->ip_address,
            'model'=> $request->model,
            'processor'=> $request->processor,
            'total_HDD'=> $request->total_HDD,
            'operating_system'=> $request->operating_system,
            'ram'=> $request->ram,
            'hark_disk'=> $request->hark_disk,
            'motherboard_summary'=> $request->motherboard_summary,
            'description'=> $request->description,
            'current_user'=> $request->current_user,
            'status'=> $request->status,
            'monitors_summary'=> $request->monitors_summary,
            'screen_size'=> $request->screen_size,
            'year_used'=> strtotime($request->year_used),
            'location' => $request->location
        ];
        PcName::create($data);
        return redirect()->route('pcnames.index')->withSuccess('New Pc Name is added successfully.');
    }
    public function edit($id){
        $pcname = PcName::find($id);
        return view('admin.pcname.edit',[
            'pcname' => $pcname
        ]);
    }
    public function update($id,UpdatePcNameRequest $request){
        $data = [
            'network_name' => $request->network_name,
            'ip_address'=> $request->ip_address,
            'model'=> $request->model,
            'processor'=> $request->processor,
            'total_HDD'=> $request->total_HDD,
            'operating_system'=> $request->operating_system,
            'ram'=> $request->ram,
            'hark_disk'=> $request->hark_disk,
            'motherboard_summary'=> $request->motherboard_summary,
            'description'=> $request->description,
            'current_user'=> $request->current_user,
            'status'=> $request->status,
            'monitors_summary'=> $request->monitors_summary,
            'screen_size'=> $request->screen_size,
            'year_used'=> strtotime($request->year_used),
            'location' => $request->location
        ];
        PcName::find($id)->update($data);
        return redirect()->back()
                ->withSuccess('PcName is updated successfully.');
    }
    public function delete($id){
        PcName::find($id)->delete();
        return redirect()->route('pcnames.index')
                ->withSuccess('PC Name is deleted successfully.');
    }
    public function search(Request $request){
        $search = $request->search;
        $field = $request->field;
        $pcnames = PcName::where($field,'like', '%' . $search . '%')->paginate(20);
        return view('admin.pcname.index', ['pcnames' => $pcnames,
                                            'field'    =>$field ,
                                            'search' => $search]);
    }
}
