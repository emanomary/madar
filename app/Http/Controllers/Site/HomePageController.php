<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\MadarNews\Interfaces\CategoryInterface;
use App\MadarNews\Interfaces\NewInterface;
use App\MadarNews\Interfaces\SettingInterface;
use App\MadarNews\Interfaces\VideoInterface;

class HomePageController extends Controller
{
    /**
     * object from UsersRepository
     */
    protected $settingRepository,
              $categoryRepository,
              $newRepository,
              $videoRepository;

    /**
     * HomePageController constructor.
     * @param SettingInterface $settingRepository
     * @param CategoryInterface $categoryRepository
     * @param NewInterface $newRepository
     * @param VideoInterface $videoRepository
     */
    public function __construct(SettingInterface $settingRepository,CategoryInterface $categoryRepository,
                                NewInterface $newRepository,VideoInterface $videoRepository)
    {
        $this->settingRepository = $settingRepository;
        $this->categoryRepository = $categoryRepository;
        $this->newRepository = $newRepository;
        $this->videoRepository = $videoRepository;
    }

    /**
     * get all data of index page
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $setting = $this->settingRepository->all();
        $categories = $this->categoryRepository->getCategories();
        $news = $this->newRepository->getFirstFiveNews();

        foreach ($categories as $category)
        {
            if($category->slug == 'middle-east')
                $middleEast  = $this->newRepository->getMiddleEastNews($category->id);
            elseif ($category->slug == 'science-technology')
                $techs  = $this->newRepository->getTechNews($category->id);
            elseif ($category->slug == 'health')
                $healths  = $this->newRepository->getHealthNews($category->id);
            elseif ($category->slug == 'infoGraphic')
                $infoGraphics = $this->newRepository->getInfoGraphicNews($category->id);
            elseif ($category->slug == 'investigations-articles')
            {
                $article = $category->child->first();
                $investigation = $category->child->last();
                $articleNews = $this->newRepository->getArticleNews($article->id);
                $investigationNews = $this->newRepository->getInvestigationNews($investigation->id);

            }
        }

        $youtubes = $this->videoRepository->getYoutube();
        $urls[]='';
        foreach ($youtubes as $index=>$youtube)
        {
            $url = $youtube->url;
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );

            $urls[$youtube->id] =  $my_array_of_vars['v'];
        }

        return view('site.index',compact(
            'setting','categories','news','middleEast','healths','techs',
            'infoGraphics','youtubes','urls','articleNews','investigationNews'
        ));
    }

    /**
     * get all news by category id
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function categoryNews($id)
    {
        $setting = $this->settingRepository->all();
        $categories = $this->categoryRepository->getCategories();
        $categoryNews = $this->newRepository->getCategoryNews($id);

        return view('site.categoryNews',compact('setting','categories','categoryNews','id'));
    }

    public function showNew($slug)
    {
        $setting = $this->settingRepository->all();
        $categories = $this->categoryRepository->getCategories();
        $showNew = $this->newRepository->getNewBySlug($slug);
        $latestNews = $this->newRepository->getLatestNews();

        return view('site.showNew',compact('setting','categories','slug','showNew','latestNews'));
    }
}
