<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\UserData;
use Storage;

class DocxdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->download(public_path().'/uploads/docx/Venue Questionaire Final.docx', 'Venue Questionaire Final.docx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disk = "uploads";
        $files1 = $request->files1;
        $files2 = $request->files2;
        $file1_url = '';
        $file2_url = '';
        //return count($files1);
        if(count($files1)!=0){
            foreach ($files1 as $file) {
                $file1Path = Storage::disk($disk)->put('file1', $file);
                $file1_url .= $file1Path.",";
            }
        }
        if(count($files2)!=0){
            foreach ($files2 as $file) {
                $file2Path = Storage::disk($disk)->put('file2', $file);
                $file2_url .= $file2Path.",";
            }
        }

        $user_input = json_decode($request->data);
        //return $file1_url."-----".$file2_url;
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_path().'/resources/template.docx');
        $templateProcessor->setValue('venue_name', $user_input->venue_name);
        $templateProcessor->setValue('seat_cnt', $user_input->seat_cnt);
        $templateProcessor->setValue('section_cnt', $user_input->section_cnt);
        $templateProcessor->setValue('stu_seat_cnt', $user_input->stu_seat_cnt);
        $templateProcessor->setValue('holder_cnt', $user_input->holder_cnt);
        $templateProcessor->setValue('holder_pos', $user_input->holder_pos);
        $templateProcessor->setValue('arm_width', $user_input->arm_width);
        $templateProcessor->setValue('arm_kind', $user_input->arm_kind);
        $templateProcessor->setValue('rate', $user_input->rate);
        $templateProcessor->setValue('others', $user_input->others);
        $templateProcessor->setValue('name1', $user_input->name1);
        $templateProcessor->setValue('number1', $user_input->number1);
        $templateProcessor->setValue('email1', $user_input->email1);
        $templateProcessor->setValue('name2', $user_input->name2);
        $templateProcessor->setValue('number2', $user_input->number2);
        $templateProcessor->setValue('email2', $user_input->email2);
        $templateProcessor->setValue('val1_1', $user_input->val1_1);
        $templateProcessor->setValue('val1_2', $user_input->val1_2);
        $templateProcessor->setValue('val1_3', $user_input->val1_3);
        $templateProcessor->setValue('val1_4', $user_input->val1_4);
        $templateProcessor->setValue('val2_1', $user_input->val2_1);
        $templateProcessor->setValue('val2_2', $user_input->val2_2);
        $templateProcessor->setValue('val2_3', $user_input->val2_3);
        $templateProcessor->setValue('val2_4', $user_input->val2_4);
        $templateProcessor->setValue('val3_1', $user_input->val3_1);
        $templateProcessor->setValue('val3_2', $user_input->val3_2);
        $templateProcessor->setValue('val3_3', $user_input->val3_3);
        $templateProcessor->setValue('val3_4', $user_input->val3_4);
        $templateProcessor->setValue('val4_1', $user_input->val4_1);
        $templateProcessor->setValue('val4_2', $user_input->val4_2);
        $templateProcessor->setValue('val4_3', $user_input->val4_3);
        $templateProcessor->setValue('val4_4', $user_input->val4_4);
        //////////////////
        $templateProcessor->setValue('holder1', ($user_input->is_holder=='1')?"√":"");
        $templateProcessor->setValue('holder2', ($user_input->is_holder=='2')?"√":"");
        $templateProcessor->setValue('wifi1', ($user_input->is_wifi=='1')?"√":"");
        $templateProcessor->setValue('wifi2', ($user_input->is_wifi=='2')?"√":"");
        $templateProcessor->setValue('perfom1', ($user_input->performance=='1')?"√":"");
        $templateProcessor->setValue('perfom2', ($user_input->performance=='2')?"√":"");
        $templateProcessor->setValue('perfom3', ($user_input->performance=='3')?"√":"");
        $templateProcessor->setValue('perfom4', ($user_input->performance=='4')?"√":"");
        $templateProcessor->setValue('perfom5', ($user_input->performance=='5')?"√":"");
        /////////////////
        $templateProcessor->saveAs('uploads/docx/Venue Questionaire Final.docx');
        $user = new UserData([
            'venue_name'=>($user_input->venue_name==NULL)?"":$user_input->venue_name,
            'seat_cnt'=>($user_input->seat_cnt==NULL)?"":$user_input->seat_cnt,
            'section_cnt'=>($user_input->section_cnt==NULL)?"":$user_input->section_cnt,
            'stu_seat_cnt'=>($user_input->stu_seat_cnt==NULL)?"":$user_input->stu_seat_cnt,
            'is_holder'=>$user_input->is_holder,
            'is_wifi'=>$user_input->is_wifi,
            'performance'=>($user_input->performance==NULL)?"0":$user_input->performance,
            'holder_cnt'=>($user_input->holder_cnt==NULL)?"":$user_input->holder_cnt,
            'holder_pos'=>($user_input->holder_pos==NULL)?"":$user_input->holder_pos,
            'arm_width'=>($user_input->arm_width==NULL)?"":$user_input->arm_width,
            'arm_kind'=>($user_input->arm_kind==NULL)?"":$user_input->arm_kind,
            'rate'=>($user_input->rate==NULL)?"":$user_input->rate,
            'others'=>($user_input->others==NULL)?"":$user_input->others,
            'name1'=>($user_input->name1==NULL)?"":$user_input->name1,
            'number1'=>($user_input->number1==NULL)?"":$user_input->number1,
            'email1'=>($user_input->email1==NULL)?"":$user_input->email1,
            'name2'=>($user_input->name2==NULL)?"":$user_input->name2,
            'number2'=>($user_input->number2==NULL)?"":$user_input->number2,
            'email2'=>($user_input->email2==NULL)?"":$user_input->email2,
            'val1_1'=>($user_input->val1_1==NULL)?"":$user_input->val1_1,
            'val1_2'=>($user_input->val1_2==NULL)?"":$user_input->val1_2,
            'val1_3'=>($user_input->val1_3==NULL)?"":$user_input->val1_3,
            'val1_4'=>($user_input->val1_4==NULL)?"":$user_input->val1_4,
            'val2_1'=>($user_input->val2_1==NULL)?"":$user_input->val2_1,
            'val2_2'=>($user_input->val2_2==NULL)?"":$user_input->val2_2,
            'val2_3'=>($user_input->val2_3==NULL)?"":$user_input->val2_3,
            'val2_4'=>($user_input->val2_4==NULL)?"":$user_input->val2_4,
            'val3_1'=>($user_input->val3_1==NULL)?"":$user_input->val3_1,
            'val3_2'=>($user_input->val3_2==NULL)?"":$user_input->val3_2,
            'val3_3'=>($user_input->val3_3==NULL)?"":$user_input->val3_3,
            'val3_4'=>($user_input->val3_4==NULL)?"":$user_input->val3_4,
            'val4_1'=>($user_input->val4_1==NULL)?"":$user_input->val4_1,
            'val4_2'=>($user_input->val4_2==NULL)?"":$user_input->val4_2,
            'val4_3'=>($user_input->val4_3==NULL)?"":$user_input->val4_3,
            'val4_4'=>($user_input->val4_4==NULL)?"":$user_input->val4_4,
            'seat_pic'=>$file1_url,
            'seat_chart'=>$file2_url
        ]);
        if(UserData::where('venue_name','=',($user_input->venue_name==NULL)?"":$user_input->venue_name)->where('email1','=',($user_input->email1==NULL)?"":$user_input->email1)->exists())
            $user->update();
        else
            $user->save();
        //$headers = ['Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        //return response()->download(public_path().'/Venue Questionaire Final.docx', 'Venue Questionaire Final.docx');
        return "OK";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
