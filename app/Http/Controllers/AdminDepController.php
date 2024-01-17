<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DEP;
use App\Http\Requests\StoreDepRequest;
use App\Http\Requests\UpdateDepRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminDepController extends Controller
{
     /**
     * Instantiate a new DepController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-dep|edit-dep|delete-dep', ['only' => ['index','show']]);
       $this->middleware('permission:create-dep', ['only' => ['create','store']]);
       $this->middleware('permission:edit-dep', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-dep', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.deps.index', [
            'deps' => Dep::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.deps.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDepRequest $request)
    {
        Dep::create($request->all());
        return redirect()->route('deps.index')
                ->withSuccess('New dep is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dep $dep)
    {
        return view('admin.deps.show', [
            'dep' => $dep
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dep $dep)
    {
        return view('admin.deps.edit', [
            'dep' => $dep
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepRequest $request, Dep $dep)
    {
        $dep->update($request->all());
        return redirect()->back()
                ->withSuccess('Dep is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dep $dep)
    {
        $dep->delete();
        return redirect()->route('deps.index')
                ->withSuccess('Dep is deleted successfully.');
    }
    public function updateStatus(){
        $data = request()->all();
        $dep = Dep::find($data['id']);
        if($data['name'] == 'publish') {
            $data = (['publish' => $data['value']]);
        }
        $dep->update($data);
        return response($dep);
    }
}
