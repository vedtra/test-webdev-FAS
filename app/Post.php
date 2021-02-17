<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use Sluggable;

    const IS_DRAFT = 1;
    const IS_PUBLIC = 0;

    protected $fillable = ['title', 'content', 'date', 'description', 'keywords'];

    public function category()
    {
       
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /*public function getComments()
    {
        if (!$this->comments->isEmpty()) {
            return $this->comments->text;
        } else {
            return null;
        }
    }*/

    public function getAuthor()
    {
        if ($this->user_id != null) {
            return $this->author->name;
        } else {
            return null;
        }
    }

    public function getCategoryTitle()
    {
        if ($this->category != null) {
            return $this->category->title;
        } else {
            return 'No category';
        }
    }

    public function getCategoryID()
    {
        if ($this->category != null) {
            return $this->category->id;
        } else {
            return;
        }
    }

    public function hasCategory()
    {
        if ($this->category_id != null) {
            return $this->category->slug;
        } else {
            return null;
        }
    }

    public function getTagsTitles()
    {
        if (!$this->tags->isEmpty()) { 
            return implode(', ', $this->tags->pluck('title')->all());
        } else {
            return 'no tag';
        }

    }

    public function tags()
    { // many to many
        return $this->belongsToMany(
            Tag::class, 
            'post_tags', 
            'post_id',
            'tag_id'
        );
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->generateDescription();

        $post->user_id = Auth::user()->user_id;
        $post->save();

        return $post;
    }

    public function generateDescription()
    {
        if($this->description == null) {
            $this->description = str_limit(strip_tags($this->content), 160);
        }
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->generateDescription();
        $this->save();
    }

    public function remove()
    {
        $this->removeImage();
        $this->delete();
    }

    public function removeImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }
        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename); 
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/img/no-img.png';
        } else {
            return '/uploads/' . $this->image;
        }

    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->tags()->sync($ids);
    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value)
    {
        if ($value == null) { 
            return $this->setPublic(); //0
        } else {
            return $this->setDraft(); //1
        }
    }

    public function setFeatured()
    {
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value)
    {
        if ($value == null) { 
            return $this->setStandart(); //0
        } else {
            return $this->setFeatured();
        }
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
        return $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        $this->attributes['date'] = $date;
        return $date;
    }

    public function getDate()
    {
        $date = Carbon::createFromFormat('d/m/y', $this->date)->format('F d Y');
        $this->attributes['date'] = $date;
        return $date;
    }


    public function hasPrevious()
    {
        
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious();
        return self::find($postID);


    }

    public function hasNext()
    { 
        return $this->where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }

    public function related()
    {
       
        return self::all()->where('category_id', '=', $this->category_id)->except('$this->id');
    }

    public static function getPopularPosts()
    {
        return self::orderBy('views', 'desc')->take(3)->get();
    }

    public static function getFeaturedPosts()
    {
        return self::where('is_featured', '=', 1)->take(3)->get();
    }

    public static function getRecentPosts()
    {
        return self::orderBy('date', 'desc')->take(4)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }

    public function countComments()
    {
        return $this->comments()->count();
    }


}
