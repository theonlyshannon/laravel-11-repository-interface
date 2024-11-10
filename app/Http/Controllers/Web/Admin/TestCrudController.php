<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestCrudRequest;
use App\Interfaces\TestCrudRepositoryInterface;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Illuminate\Http\Request;
class TestCrudController extends Controller
{
    protected $testCrudRepository;

    public function __construct(TestCrudRepositoryInterface $testCrudRepository)
    {
        $this->testCrudRepository = $testCrudRepository;

        $this->middleware(['permission:test-crud-list'], ['only' => ['index', 'store']]);
        $this->middleware(['permission:test-crud-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:test-crud-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:test-crud-delete'], ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $testCruds = $this->testCrudRepository->getAllTestCruds();

        return view('pages.admin.__________.test-crud.index', compact('testCruds'));
    }

    public function create()
    {
        return view('pages.admin.__________.test-crud.create');
    }

    public function store(TestCrudRequest $request)
    {
        $data = $request->validated();

        try {
            $this->testCrudRepository->createTestCrud($data);

            Swal::toast('Test crud berhasil ditambahkan', 'success');
        } catch (\Exception $e) {
            Swal::toast('Test crud gagal ditambahkan', 'error');
        }

        return redirect()->route('admin.__________.test-crud.index');
    }

    public function show($id)
    {
        $testCrud = $this->testCrudRepository->getTestCrudById($id);

        return view('pages.admin.__________.test-crud.show', compact('testCrud'));
    }

    public function edit($id)
    {
        $testCrud = $this->testCrudRepository->getTestCrudById($id);

        return view('pages.admin.__________.test-crud.edit', compact('testCrud'));
    }

    public function update(TestCrudRequest $request, $id)
    {
        $data = $request->validated();

        try {
            $this->testCrudRepository->updateTestCrud($data, $id);

            Swal::toast('Test crud berhasil diperbarui', 'success');
        } catch (\Exception $e) {
            Swal::toast('Test crud gagal diperbarui', 'error');
        }

        return redirect()->route('admin.test-crud.index');
    }

    public function destroy($id)
    {
        try {
            $this->testCrudRepository->deleteTestCrud($id);

            Swal::toast('Test crud berhasil dihapus', 'success');
        } catch (\Exception $e) {
            Swal::toast('Test crud gagal dihapus', 'error');
        }

        return redirect()->route('admin.test-crud.index');
    }
}