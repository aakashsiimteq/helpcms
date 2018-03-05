<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Help_Content;

class cmsCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //showing the list of all the help contents
        $content = Help_Content::orderBy('id','DESC')->paginate(5);
        return view('cmsCRUD.index',compact('content'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //the create form
        return view('cmsCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store the contents
        $this->validate($request, [
            'url'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);
        Help_Content::create($request->all());
        return redirect()->route('cmsCRUD.index')
                        ->with('success','Help content created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //showing the selected help content
       $content= Help_Content::find($id);
       return view('cmsCRUD.show',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //edit pager
        $content= Help_Content::find($id);
        return view('cmsCRUD.edit',compact('content'));
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
        //update

        $this->validate($request, [
            'url'=> 'required',
            'title'=> 'required',
            'details'=> 'required'
        ]);

       Help_Content::find($id)->update($request->all());
       return redirect()->route('cmsCRUD.index')
                       ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the contents
       Help_Content::find($id)->delete();
       return redirect()->route('cmsCRUD.index')
                       ->with('success','Product deleted successfully');
    }
}
