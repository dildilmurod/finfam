<?php

namespace App\Http\Controllers;

use App\Category;
use App\Finance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $finance = Finance::all();

        return view('finance.index', compact('finance'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category_id = null;
        $categories = Category::pluck('title', 'id');
        return view('finance.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required',
            'sum' => 'required',
        ]);
        $model = new Finance();
        $model->title = $request->input('title');
        if(empty($request->input('date'))) {
            $model->date = date("Y-m-d H:i:s");
        }
        else {
            $model->date = $request->input('date');
        }
        $model->type = $request->input('type');
        $model->category_id = $request->input('category_id');
        $model->sum = $request->input('sum');
        $model->comment = $request->input('comment');
        //print_r($model->category_id);die();
        $model->save();

        return redirect('/finance')->with('success', 'Добавлен элемент');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $finance = Finance::find($id);
//        $categories = Category::pluck('title', 'id');
        return view('finance.show', compact(['finance', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finance = Finance::find($id);
        $categories = Category::pluck('title', 'id');
        return view('finance.edit', compact(['finance', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'date' => 'required',
            'sum' => 'required',
        ]);

        $model = Finance::find($id);
        $model->title = $request->input('title');
        if(empty($request->input('date'))) {
            $model->date = date("Y-m-d H:i:s");
        }
        else {
            $model->date = $request->input('date');
        }
        $model->type = $request->input('type');
        $model->category_id = $request->input('category_id');
        $model->sum = $request->input('sum');
        $model->comment = $request->input('comment');
        $model->save();

        return redirect('/finance')->with('success', 'Элемент обновлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Finance::find($id);


        $model->delete();
        return redirect('/')->with('success', 'Element is Deleted');
    }
    public function all()
    {
        $finances = Finance::all();

        return view('finance.all', compact('finances'));
    }


}
