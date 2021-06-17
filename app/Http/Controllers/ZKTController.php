<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Illuminate\Http\Request;
use Rats\Zkteco\Lib\ZKTeco;

class ZKTController extends Controller
{
    public function fetchAttendanceGraph($id){
        $p = Attendance::whereMonth('attendance_date', date('m'))
            ->whereYear('attendance_date', date('Y'))
            ->where('user_id',$id)
            ->where('type','1')
            ->orderby('attendance_date','asc')->count();
        $c_d = date('d');
        $t_d  = date('t');
        $a = abs($p-$c_d);
        $r = abs($c_d - $t_d);
        return view('graph',compact('p','a','r'));
    }


    public function makeConnection(){
        $response = null;
        system("ping 192.168.1.201", $response);
        if($response == 0)
        {
            return true;
        }
        else
            return false;
    }

    public function checkDeviceConnection(){
        $response = null;
        system("ping 192.168.1.201", $response);
        if($response == 0)
        {
            return redirect()->back()->with('info', 'Device is connected!');
        }
        else
            return redirect()->back()->with('error', 'Device is not connected!');
    }

    public function setAllEmployees(){
        $users = User::all()->except(1);
        if (count($users) > 0 ){
            $conn = self::makeConnection();
            if ($conn){
                $zk = new ZKTeco('192.168.1.201');
                $zk->connect();
                foreach ($users as $user){
                    $zk->setUser($user->id,$user->id,$user->employee_name,'');
                }
                return redirect()->back()->with('success', 'All Employees are created in device!');
            }
            else{
                return redirect()->back()->with('error', 'Device is not connected!');
            }
        }else{
            return redirect()->back()->with('error', 'Employees not found!');
        }
    }

    public function getAttendance(){
        $conn = self::makeConnection();
        if ($conn){
            $zk = new ZKTeco('192.168.1.201');
            $zk->connect();
            $data = $zk->getAttendance();
            Attendance::truncate();
            foreach ($data as $d){

                Attendance::create([
                    'id' => $d['uid'],
                    'department_name' => User::find($d['id'])['department']['department_name'],
                    'user_id' => $d['id'],
                    'attendance_date' => $d['timestamp'],
                    'type' => $d['type'],
//                    'attendance_status' =>  ,
                ]);
            }
            
            return redirect()->back()->with('success', 'Get all attendance successfully from device!');
        }
        else{
            return redirect()->back()->with('error', 'Device is not connected!');
        }
    }


    public function connect(){
////        echo phpinfo();
//        $zk = new ZKTeco('192.168.1.201');
//        $zk->connect();
////        $zk->enableDevice();
//
////        $zk->deviceName();
//
//
//        dump($zk->getUser());
//        dump($zk->getFingerprint('1'));
//        dd($zk->getAttendance());
//        dd('Here');
    }
}
