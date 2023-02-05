<?php 
namespace App\Actions\Bookmarks;

use App\Models\Bookmark;
use App\Models\Tag;


class CreateBookmarkAndTags {

	public function handle(array $request, int $id) {

		$bookmark = Bookmark::query()->create([
            'name' => $request['name'],
            'url' => $request['url'],
            'description' => $request['description'],
            'user_id' => $id,
        ]);

        if ($request['tags'] != null) {
			foreach (explode(',', $request['tags']) as $tag) {
				$tag = Tag::query()->firstOrCreate(
					['name' => trim(strtolower($tag))],);
			
			$bookmark->tags()->attach($tag->id);
 			}
 		}
	}
}

