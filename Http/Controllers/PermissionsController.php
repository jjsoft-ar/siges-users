<?php namespace Modules\Users\Http\Controllers;

use Auth;
use Module;
use Datatables;
use SweetAlert;
use Illuminate\Http\Request;
use Modules\Users\Entities\Modulo;
use Modules\Users\Entities\Permission;
use Yajra\Datatables\Html\Builder;
use Pingpong\Modules\Routing\Controller;
use Modules\Users\Http\Requests\CreatePermissionRequest;

class PermissionsController extends Controller {
	
	/**
     * Datatables Html Builder
     * @var Builder
     */
    protected $htmlBuilder;
    
    /**
     * @param Builder $htmlBuilder
     */
    public function __construct(Builder $htmlBuilder)
    {
        $this->htmlBuilder = $htmlBuilder;
        $this->middleware('auth');
    }
	
	/**
     * @param Request $request
     * @return $this
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return Datatables::of(Permission::select(['id', 'name', 'display_name', 'description','module']))
                ->addColumn('actions', function ($role) {
                    return $this->getButtons($role);
                })
                ->make(true);
        }
        $html = $this->htmlBuilder
            ->addColumn(['data' => 'id', 'name' => 'id', 'title' => 'Id'])
            ->addColumn(['data' => 'name', 'name' => 'name', 'title' => 'Permiso'])
            ->addColumn(['data' => 'display_name', 'name' => 'display_name', 'title' => 'Nombre'])
            ->addColumn(['data' => 'description', 'name' => 'description', 'title' => 'Descripción'])
            ->addColumn(['data' => 'module', 'name' => 'module', 'title' => 'Module'])
            ->addColumn(['data' => 'actions', 'name' => 'actions', 'title' => '', 'orderable' => false]);
        return view('users::permissions.index')->with('html', $html);
    }
	
	/**
     * @return \BladeView|bool|\Illuminate\View\View
     */
    public function create()
    {
        return view('users::permissions.create')
            ->with('modules', Modulo::all()->pluck('descripcion', 'module')->toArray());
    }

    /**
     * @param CreatePermissionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePermissionRequest $request)
    {
        dd($request->all());

        Permission::create($request->all());
        SweetAlert::success('Se ha creado el permiso', 'Excelente!')->autoclose(3500);
        return redirect()->route('permissions.index');
    }

    /**
     * @param $id
     * @return $this
     */
    public function edit($id)
    {
        $permiso = Permission::findOrFail($id);
        return view('users::permissions.edit')
            ->with('permiso', $permiso)
            ->with('modules', Modulo::all()->pluck('descripcion', 'module')->toArray());
    }

    /**
     * @param CreatePermissionRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CreatePermissionRequest $request, $id)
    {
        $permiso = Permission::findOrFail($id);
        $permiso->fill($request->all());
        $permiso->save();
        SweetAlert::success('Se ha actualizado el permiso', 'Excelente!')->autoclose(3500);
        return redirect()->route('permissions.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $permiso = Permission::findOrFail($id);
        $permiso->delete();
        SweetAlert::success('Se ha eliminado el permiso', 'Excelente!')->autoclose(3500);
        return redirect()->route('permissions.index');
    }
	/**
     * @param $role
     * @return string
     */
    public function getButtons($permiso)
    {
        $buttons = "";
        if($permiso->module != 'users'){
            if(Auth::user()->can('edit-permission'))
            {
                $buttons .= '<a href="'.route('permissions.edit', ['id' => $permiso->id]).'" data-toggle="tooltip" data-placement="top" title="Editar rol" class="btn btn-sm btn-default"><i class="fa fa-pencil"></i></a>&nbsp;';
            }
            if(Auth::user()->can('delete-permission'))
            {
                $buttons .= '<a href="'.route('permissions.destroy', ['id' => $permiso->id]).'" data-toggle="tooltip" data-placement="top" title="Eliminar rol" class="btn btn-sm btn-danger confirm-delete"><i class="fa fa-times"></i></a>&nbsp;';
            }
            return $buttons;
        }
        return $buttons;
    }

}