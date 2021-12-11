<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Support\Facades\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();

        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemberRequest $request)
    {
        // validate the data
        $validateData =  $request->validate([
            'member_code' => 'required|unique:members',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:members',
            'gender' => 'required|max:255',
            'birthdate' => 'required|max:255',
            'birthplace' => 'required|max:255',
            'religion' => 'required|max:255',
            'phone' => 'string|max:255|nullable',
            'address' => 'string|max:255|nullable',
            'city' => 'string|max:255|nullable',
            'province' => 'string|max:255|nullable',
            'country' => 'string|max:255|nullable',
            'postal_code' => 'string|max:255|nullable',
            'status' => 'required|max:255',
        ]);

        Member::create($validateData);
        Alert::success('Success', 'Member Create Successfully');
        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMemberRequest  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        Alert::success('Success', 'Member Updated Successfully');

        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();

        Alert::success('Success', 'Member Deleted Successfully');

        return redirect()->route('members.index');
    }

    // bootstrap switch on and off member status

    /**
     * Responds with a welcome message with instructions
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(UpdateMemberRequest $request, Member $member)
    {
        $member = Member::find($request->member_id);
        $member->status = $request->status;
        $member->save();
        return response()->json(['success' => 'Status Changed Successfully']);
        // dd($request->all());
    }
}
