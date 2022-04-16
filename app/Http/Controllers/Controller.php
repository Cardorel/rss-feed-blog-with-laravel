<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Vedmant\FeedReader\Facades\FeedReader;
use SimplePie as SimplePieAlias;



class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getPosts(): array
    {
        /** @var SimplePieAlias $f */
        $f = FeedReader::read('https://dev98.de/feed/');
        $result = [
            'title' => $f->get_title(),
            'description' => $f->get_description(),
            'permalink' => $f->get_permalink(),
            'link' => $f->get_link(),
            'copyright' => $f->get_copyright(),
            'language' => $f->get_language(),
            'image_url' => $f->get_image_url(),
            'author' => $f->get_author()
        ];

        foreach ($f->get_items(0, $f->get_item_quantity()) as $item) {
            $i['title'] = $item->get_title();
            $i['description'] = $item->get_description();
            $i['id'] = $item->get_id();
            $i['content'] = $item->get_content();
            $i['category'] = $item->get_category();
            $i['categories'] = $item->get_categories();
            $i['author'] = $item->get_author();
            $i['authors'] = $item->get_authors();
            $i['contributor'] = $item->get_contributor();
            $i['date'] = $item->get_date();
            $i['updated_date'] = $item->get_updated_date();
            $i['local_date'] = $item->get_local_date();
            $i['permalink'] = $item->get_permalink();
            $i['link'] = $item->get_link();
            $i['links'] = $item->get_links();
            $i['enclosure'] = $item->get_enclosure();
            $i['audio_link'] = $item->get_enclosure()->get_link();
            $i['source'] = $item->get_source();

            $result['items'][] = $i;
        }

        return $result;
    }

    private function filterPostsByTitle($title){
        $posts = $this->getPosts()['items'];
        $titleSplit = join('' , preg_split('/[^\w+]/' , $title));

        $post = [];
        foreach ($posts as $cur){
            $currentTitle = strtolower(join('' , preg_split('/[^\w+]/' , $cur['title'])));
            if(str_contains($currentTitle , $titleSplit)){
                $post[] = $cur;
            }
        }
        return $post;
    }


    public function index (){
        $posts = $this->getPosts();
        return view('welcome' , [
            'posts' => $posts,
            'searchText' => ''
        ]);
    }

    public function detail($year,$month, $day, $title){
        $posts = $this->getPosts();
        $post = array_merge(...$this->filterPostsByTitle($title));
        return view('detail' , [
            'posts' => $posts,
            'post' => $post,
            'searchText' => ''
        ]);
    }

    public function search(Request $request){
        $posts = $this->getPosts();
        $searchValue = $request->input('search');
        $postsFound = $this->filterPostsByTitle($searchValue);
        if(trim($searchValue)){
            return view('search', [
                'postsFound'=> $postsFound,
                'posts' => $posts,
                'searchText' => $searchValue
            ]);
        }
        return redirect('/');
    }
}
