<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Database\Eloquent\Model as Eloquent;
use AustinHeap\Database\Encryption\Traits\HasEncryptedAttributes;

class Crud extends Eloquent
{
    use HasEncryptedAttributes;
    protected $encrypted = [
        'title', 'description', 'status',
    ];
    public static function cindex($lmt)
    {
    	return Crud::orderBy('created_at','desc')->paginate($lmt);
    }
    public static function cupdate($request,$id)
    {
        $post = Crud::findorNew($id);
        $post->title = $request->input('title');
        $post->description = $request->input('desc');
        $post->status = "active";
        if($request->hasFile('up_file'))
        {
            $filewithext = $request->file('up_file')->getClientOriginalName();
            //$fileName = pathinfo($filewithext,PATHINFO_FILENAME);
            $ext = $request->file('up_file')->getClientOriginalExtension();
            $fileToStrore = $filewithext;
            $path = $request->file('up_file')->storeAs('public/posts_images',$fileToStrore);
            $post->up_file = $fileToStrore;
        }
        $post->save();
        $anEloquentModel = 'App\Crud';
        $user = auth()->user()->id;
        activity()
            ->inLog('Create-Post')
            ->causedBy($user)
            ->withProperties(['Add-post' => $post->title])
            ->log('Add '.$post->title.' Post by user'.$user);

        echo "suc";
        //return $post;
    }
    public static function cdestroy($id)
    {
    	$post = Crud::find($id);
        $post->delete();
        $user = auth()->user()->id;
        activity()
            ->inLog('Delete-Post')
            ->causedBy($user)
            ->withProperties(['Add-post' => $post->title])
            ->log('Delete '.$id.'id Post by user'.$user);
        return $post;
    }

}
