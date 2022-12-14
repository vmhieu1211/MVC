<?php
namespace admin\app\controller;

use admin\app\controller\Controller;

use admin\app\model\Role;

class RoleController extends Controller
{
    protected $roleModel;
    public function __construct()
    {
        parent::__construct();
        $this->roleModel = new Role();
    }

    public function index()
    {
        //vao model : viet ham getDataRolePaging lay all data
        //do ra du lieu ra ngoai view
        $listRoles = $this->roleModel->getDataRolePaging();
        $header =[
            'title'=>'Role page'
        ];
        $this->loadHeader($header);
        $this->loadView('roles/index_view',[
            'roles'=> $listRoles
        ]);
        $this->loadFooter();
        
    }
    public function create()
    {
        $header =[
            'title'=>'Create role page'
        ];
        $this->loadHeader($header);
        $this->loadView('roles/create_view');
        $this->loadFooter();
        
    }

    public function store()
    {
        if(isset($_POST['save'])){
            $nameRole = trim(strip_tags($_POST['name'] ?? ''));
            $description = trim(strip_tags($_POST['description'] ?? ''));   
        }
        if(empty($nameRole)){
            $_SESSION['errNameRole'] = 'Vui long nhap ten vai tro';
            return redirect('dashboard','index');
        } else{
            if(isset($_SESSION['errNameRole'])){
                unset($_SESSION['errNameRole']);
            }
            //luu vao db
            // kiem tra xem du lieu can luu da ton tai trong db chua?
            // neu chua thi luu 
            // neu co thi luu va thong bao loi
            if($this->roleModel->checkExistNameRole($nameRole)){
                // nguoi dung nhap ten vai tro da co roi
                return redirect('role','create');
            }  else{
                //chua co ten vai tro trong db
                $insert = $this->roleModel->insertRole($nameRole,$description);
                if($insert){
                    return redirect('role', 'index');
                } 
                return redirect('role','create');
            }
        }
    }
    public function edit()
    {
        $id = $_GET['id'] ?? null;
        $id = is_numeric($id)? $id : 0;
        // lay chi tiet du lieu cua vai tro theo id
        $info = $this->roleModel->getDataRoleById($id);
        // load view edit - do du lieu ra
        // view edit giong nhu view create 
        // thuc hien update
        // public function 
    }

    public function update()
    {
         $id = $_GET['id'] ?? null;
        $id = is_numeric($id)? $id : 0;
    }
}