<?php

namespace App\Http\Controllers;


use App\Models\Resources;
use App\Notification\NotificationOperations;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppNotificationController extends Controller
{
    private $notification_operation;

    public function __construct(){
        $this->notification_operation = new NotificationOperations();
    }

    private function isResourceExists($id){
        return Resources::find($id);
    }

    /*
     * @post - If a new $resource has been added in the database
     */
    public function post(Request $request, Response $response){
        if (!$this->isResourceExists($request->id)) {
            $resource = new Resources();
//            $resource->id = $request->id;
            $resource->name = $request->name;
            $resource->save();
            $this->notification_operation->add($resource);
            $response = response()->json([
                "message" => "success"
            ]);
        }
        else{
            $response = response()->json([
                "message" => "resouce already exists"
            ]);
        }
        return $response;
    }

    /*
     * @post - If a particular $resource has been updated in the database
     */
    public function put(Request $request, Response $response){
        $resource = $this->isResourceExists($request->id);
        if ($resource) {
            $resource->name = $request->name;
            $resource->save();
            $this->notification_operation->update($resource);
            $response = response()->json([
                "message" => "success"
            ]);
        }
        else{
            $response = response()->json([
                "message" => "resource does not exists"
            ]);
        }
        return $response;
    }

    /*
     * @post - If a particular $resource has been deleted from the database
     */
    public function delete(Request $request, Response $response){
        $resource = $this->isResourceExists($request->id);
        if ($resource) {
            $resource->delete();
            $this->notification_operation->delete($resource);
            $response = response()->json([
                "message" => "success"
            ]);
        }
        else{
            $response = response()->json([
                "message" => "resource does not exists"
            ]);
        }
        return $response;
    }

    /*
     * @get - Get specific unread notifications
     */
    public function get(Request $request, Response $response){

    }

    /*
     * @getAll - Get All the Unread notifications
     */
    public function getAll(Request $request, Response $response){

    }

    /*
     * @read_notification - if you have read a particular notification,
     *                      update column 'read_at' in Notifications table
     */
    public function read_notification(Request $request, Response $response){

    }
}