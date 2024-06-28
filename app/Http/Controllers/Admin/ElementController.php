<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ElementsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ElementRequest;
use App\Http\Resources\ElementCollection;
use App\Http\Resources\ElementResource;
use App\Models\Element;
use App\Traits\Upload_image;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ElementController extends Controller
{
    use Upload_image;
    public function all_elements(ElementsDataTable $dataTables){
        return $dataTables->render('admin.element.index');
    }

    public function edit($id){
        $element = Element::findOrFail($id);
        return view('admin.element.edit',compact('element'));
    }

    public function update($id,ElementRequest $request){
        $element = Element::findOrFail($id);

        $element->image_url = isset($request->image_url) ? $request->image_url : $element->image_url;
        $element->name = $request->name;
        $element->symbol = $request->symbol;
        $element->atomic_number=$request->atomic_number;
        $element->description= $request->description;
        $element->save();
        toastr('Data Updated Successfully','success');
        return redirect()->route('all.element');
    }

    public function all_in_api(Request $request){
        $query = Element::query();

        // Search by name
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        // Filter by atomic number range
        if ($request->has('atomic_number_min')) {
            $query->where('atomic_number', '>=', $request->input('atomic_number_min'));
        }
        if ($request->has('atomic_number_max')) {
            $query->where('atomic_number', '<=', $request->input('atomic_number_max'));
        }

        // Sort results
        $sortField = $request->input('sort', 'id');
        $sortOrder = $request->input('order', 'asc');
        $query->orderBy($sortField, $sortOrder);

        // Paginate results
        $elements = $query->paginate($request->input('limit', 10));
        return new ElementCollection($elements);

    }
    public function just_one_api(Element $element){
        return new ElementResource($element);
    }

    public function destroy($id){
     $element = Element::findOrFail($id);
     $this->remove_image($element->image_url);
     $element->delete();
     toastr('Data Updated Successfully','success');
     return redirect()->route('all.element');
    }
}
