<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
//        hiển thị danh sách khách hàng
        $customers = Customers::paginate(5);
        return view("list", compact("customers"));
    }

    public function create()
    {
//        show form tạo mới khách hàng
        return view('create');
    }

    public function store(Request $request)
    {
//        thực hiện thêm mới khách hàng
        $customer = new Customers();
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $file = $request->inputFile;

        if (!$request->hasFile('inputFile')) {
            $customer->avatar = $request->inputFile;
        } else {
            $path = $file->store('avatar', 'public');
            $customer->avatar = $path;
        }

        $customer->save();
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
//      hiển thị form và dữ liệu khách hàng cần sửa
        $customer = Customers::findOrFail($id);
        return view('edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $customer = Customers::findOrFail($id);
        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->email = $request->email;
        $customer->save();
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
//        xóa khách hàng
        Customers::destroy($id);
        return redirect()->route('customers.index');
    }

}
