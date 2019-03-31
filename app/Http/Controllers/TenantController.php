<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Tenant;
use App\Http\Requests\UploadPhotoRequest;
use Illuminate\Pagination\LengthAwarePaginator;
class TenantController extends Controller
{
    //user
    public function home()
    {
      return view('tenants.home');
    }

<<<<<<< HEAD
    public function main()
    {
        $tenants = Tenant::orderBy('level')->orderBy('name')->get();
        $sorter = Tenant::select('level')->distinct()->get();
        $compare = 'level';
        return view('tenants.main', [
            'tenants' => $tenants,
            'sorter' => $sorter,
            'compare' => $compare
        ]);
    }

    public function sort($type){

        if($type === 'level'){
            $tenants = Tenant::orderBy('level')->orderBy('name')->get();
            $sorter = Tenant::select('level')->distinct()->get();
            $compare = 'level';
        }
        else if($type === 'category'){
            $tenants = Tenant::orderBy('category')->orderBy('name')->get();
            $sorter = Tenant::select('category')->distinct()->get();
            $compare = 'category';
        }
        else if($type === 'zone'){
            $tenants = Tenant::orderBy('zone')->orderBy('name')->get();
            $sorter = Tenant::select('zone')->distinct()->get();
            $compare = 'zone';
        }
        return view('tenants.main', [
            'tenants' => $tenants,
            'sorter' => $sorter,
            'compare' => $compare
        ]);
    }

    public function displayMap($id){
      $tenants = Tenant::find($id);
      if(!$tenants) throw new ModelNotFoundException;
      return view('tenants.main', [
          'tenant' => $tenants
      ]);
    }

=======
    public function main(Request $request)
    {
        $sort = $request->input('sort');
        if(empty($sort))
            $sort = 'zone';
            
        $id = $request->input('id');

        $aTenant = Tenant::find($id);
        $tenants = Tenant::orderBy($sort)->orderBy('name')->where('id', '!=', '1')->get();
        $sorter = Tenant::select($sort)->distinct()->where($sort, '!=', 'sample')->get();
        
        return view('tenants.main', [
            'tenants' => $tenants,
            'sorter' => $sorter,
            'sort' => $sort,
            'aTenant' => $aTenant
        ]);
    }
>>>>>>> 94e6be18db3d696a6daabc9315b6c1bf9a70f0bf
    
    //admin
    public function create()
    {
        $tenant = new Tenant();
        return view('tenants.create', [
        'tenant' => $tenant,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>[
                'required',
                'unique:tenants',
                'regex:/^.{1,50}$/',
            ],
            'lot_number' =>[
                'required',
                'unique:tenants',
                'regex:/^[NEWS]-[1-4]-[0-9]{1,2}/',
            ],
            'zone'=> 'required',
            'level' => 'required',
            'category' => [
                'required',
                'regex:/^[A-Za-z]{1,20}$/'
            ],
        ]);

        $tenant = new Tenant();
        $tenant->fill($request->all());
        $tenant->save();
        return redirect()->route('tenant.index');
    }

    public function index(Request $request)
    {
        $tenants = Tenant::orderBy('id')
        ->when($request->query('lot_number'), function($query) use ($request) {
            return $query->where('lot_number', $request->query('lot_number'));
        })
        ->when($request->query('name'), function($query) use ($request) {
            return $query->where('name', 'like', '%'.$request->query('name').'%');
        })
        ->when($request->query('category'), function($query) use ($request) {
            return $query->where('category', $request->query('category'));
        })
        ->when($request->query('zone'), function($query) use ($request) {
            return $query->where('zone', $request->query('zone'));
        })
        ->when($request->query('level'), function($query) use ($request) {
            return $query->where('level', $request->query('level'));
        })
        ->paginate(10);

        return view('tenants.index', [
            'request' => $request,
            'tenants' => $tenants,
        ]);
    }

    public function search(Request $request)
    {
      $tenants = Tenant::orderBy('category')->orderBy('name')
      ->when($request->query('lot_number'), function($query) use ($request) {
          return $query->where('lot_number', $request->query('lot_number'));
      })
      ->when($request->query('name'), function($query) use ($request) {
          return $query->where('name', 'like', '%'.$request->query('name').'%');
      })
      ->when($request->query('category'), function($query) use ($request) {
          return $query->where('category', $request->query('category'));
      })
      ->when($request->query('zone'), function($query) use ($request) {
          return $query->where('zone', $request->query('zone'));
      })
      ->when($request->query('level'), function($query) use ($request) {
          return $query->where('level', $request->query('level'));
      })
      ->paginate(10);

      return view('tenants.search', [
          'request' => $request,
          'tenants' => $tenants,
      ]);
    }

    public function show($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;
        return view('tenants.show', [
            'tenant' => $tenant
        ]);
    }

    public function edit($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;
        return view('tenants.edit', [
            'tenant' => $tenant
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' =>[
                'required',
                'regex:/^.{1,50}$/'
            ],
            'lot_number' =>[
                'required',
                'regex:/^([NEWS]-[1-4]-[0-9]{1,2})$/'
            ],
            'zone'=> 'required',
            'level' => 'required',
            'category' => [
                'required',
                'regex:/^([A-Za-z]{1,20})$/'
            ],
        ]);

        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;
        $tenant->fill($request->all());
        $tenant->save();
        return redirect()->route('tenant.index');
    }

    public function upload($id)
    {
        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;
        return view('tenants.upload', [
            'tenant' => $tenant,
        ]);
    }

    public function saveUpload(UploadPhotoRequest $request,$id){
        $file = $request-> file('image');
        $path = $file->storeAs('public/tenants', $id.'.jpg');
        return redirect()-> route('tenant.index');
    }

    public function destroy($id){
        $tenant = Tenant::find($id);
        if(!$tenant) throw new ModelNotFoundException;
        $tenant->delete();
        return redirect()->route('tenant.index')->with('alert','Deleted');
    }
}
