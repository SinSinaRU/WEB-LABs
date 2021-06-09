<?php

namespace app\models;

use app\core\Model;


class My_interests extends Model
{

    private $aboutRyanGosling = 'Обожаю Райана Гослинга и всё что с ним связано: Drive, зубочистки, "клетки связаны, связны, клетки связаны,
            связны, клеток связанных внутри,
            клеток связанных внутри, клеток связанных внутри", Место по д соснами, зубочистки.
            <img src="../../../public/assets/img/Gosling7.jpg" alt="Гослинг сидит" height=400px width=auto></';
    private $aboutMusic = 'Люблю слушать рок, особенно такие группы как: Linkin Park, AC/DC, Bullet For My Valentine, Asking
            Alexandria, П#рноФильмы.
            <img src="public/assets/img/LinkinPark.jpg" alt="Линкин Парк" height=250px width=auto>
            <br><br>
            Также я учусь играть на акустической гитаре Yamaha F310.';
    private $aboutCompGames = ' В своё время пытался стать киберспортсменом по Counter-Strike: Global Offensive. К сожалению, а может и к
            счастью, я решил прекратить свои поптыки.
            А так ещё люблю в свободное время поиграть в компьютерные игры, в основном это Counter-Strike: Global
            Offensive и World Of Tanks.
            <br> В следующем видео будут несколько моих неплохих моментов, с одного из многих турниров, что я играл:<br>
            <video width=480px height=auto controls src="public/assets/videos/Few best moments.mp4"></video>
            <br> А в этом видео будет очень везучий момент с World Of Tanks:<br>
            <video width=480px height=auto controls src="public/assets/videos/ебр.mp4"></video>';
    public $arrayOfInterests = array();
    public $arrayOfHrefs = array();

    public function __construct()
    {
    }
    public function getInterestsText()
    {
        $this->arrayOfInterests = ["aboutRyanGosling" => $this->aboutRyanGosling, "aboutMusic" => $this->aboutMusic, "aboutCompGames" => $this->aboutCompGames];
        return $this->arrayOfInterests;
    }
    public function getInterestsHref(){
        $this->arrayOfHrefs = ["#aboutRyanGosling" => "О Райане Гослинге", "#aboutMusic" => "О музыке", "#aboutCompGames" => "О компьютерных играх"];
        return $this->arrayOfHrefs;
    }

}