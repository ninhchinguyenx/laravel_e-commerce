<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\User\StoreRequest;
use App\Http\Requests\Backend\User\UpdateRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $config =  $this->config();
        $users = $this->userService->getAll();
        return view('backend.user.index',  compact('config', 'users'));
    }

    public function create()
    {
        $provinces = Province::all();
        return view('backend.user.create', compact('provinces'));
    }
    public function store(StoreRequest $request)
    {
        try {
            $users = $this->userService->create($request->all());
            return redirect()->route('user.index')->with('success', 'Người dùng đã được tạo thành công!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function edit($id)
    {
        $user = $this->userService->findById($id);
        $provinces = Province::all();
        $districts = District::all();
        $wards = Ward::all();
        return view('backend.user.edit', compact('user', 'provinces', 'districts', 'wards'));
    }

    public function update(UpdateRequest $request, $id){
        try {
            $user = $this->userService->update($id, $request->all());
            return redirect()->route('user.index')->with('success', 'Người dùng đã được sửa thành công!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy(Request $request, $id){
        try {
            $user =  $this->userService->deleteUser($id, $request->status);
            return response()->json(['success' => true, 'status' => $user->status]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    private function config()
    {
        return [
            'css' => [
                'https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css',
                'https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css',
                'https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css',

                // 'http://127.0.0.1:8000/backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css',
                // 'http://127.0.0.1:8000/backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css'
            ],
            'js' => [
                'https://code.jquery.com/jquery-3.6.0.min.js',

                'https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js',
                'https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js',
                'https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js',
                'https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js',
                'https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js',
                'https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
                'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',

                'http://127.0.0.1:8000/backend/assets/js/pages/datatables.init.js',
                // 'http://127.0.0.1:8000/backend/assets/libs/filepond/filepond.min.js',
                // 'http://127.0.0.1:8000/backend/assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js',
                // 'http://127.0.0.1:8000/backend/assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js',
                // 'http://127.0.0.1:8000/backend/assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js',
                // 'http://127.0.0.1:8000/backend/assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js',
                // 'http://127.0.0.1:8000/backend/assets/js/pages/form-file-upload.init.js'
            ],
        ];
    }
}
