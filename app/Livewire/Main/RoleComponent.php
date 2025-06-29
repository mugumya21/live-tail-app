<?php

namespace App\Livewire\Main;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerExport;
Use App\Models\Role;
Use App\Models\Permission;

class RoleComponent extends Component
{
    use WithPagination;

    public $name;
    public $description;
    public $search;
    public $editRoleId;
    public $editRoleName;
    public $allpermissions = [];
    public $permissions = [];




    public function render()
    {
        $this->allpermissions = Permission::all();
        $roles = Role::with('permissions')->where('name', 'like', "%{$this->search}%")->paginate(2);

        Redis::set('roles', json_encode($roles));
        Redis::set('roles_count', $roles->total());

        $roleCount = Redis::get('roles_count');

        return view('livewire.main.role-component', [
            'roles' => $roles,
            'allpermissions' => $this->allpermissions
        ]);
    }

    public function edit($editid){
        $this->editRoleId =  $editid;
        $this->editRoleName = Role::find($editid)->name;




    }
    public function save(){
        $role = Role::find($this->editRoleId);

        $role->update([
            'name'=>$this->editRoleName
        ]);

        $this->reset(['editRoleId']);

    }


    public function delete(Role $roleObj){

            $roleObj->delete();
            flash()->success('Role deleted successfully');


    }

    public function export(){
        return Excel::download(new CustomerExport, 'role.xlsx');
    }



    public function updatedSearch()
    {
        $this->resetPage();
    }


    public function addRole()
    {
        $validated = $this->validate([

                'name'=>'required|min:5',
                'description'=>'unique:roles',
                'permissions'=>'required|array',
                'permissions.*'=>'exists:permissions,id'
            ]

        );
        DB::transaction(function() use (&$validated){
            $validated['guard_name'] = 'web';

            $role = Role::create($validated);
            $role->permissions()->attach($this->permissions);

        });

        $this->reset(['name', 'description', 'permissions']);
        flash()->success('Role created successfully');
    }






}



