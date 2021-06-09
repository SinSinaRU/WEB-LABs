<?php
namespace app\models;
use app\core\Model;
class Photo_album extends Model{
    public function __construct()
    {
    }

    public function getImg(){
        $imgs = [
            'img' => ["Me_It's_Gosling",
                "Purple_Gosling",
                "Gosling",
                "Gosling2",
                "Gosling3",
                "Gosling4",
                "Gosling5",
                "Makes_You_Think",
                "Sound_of_Silence",
                "Clones",
                "Day_Drive",
                "blade_runner",
                "Question",
                "Don't_Understand",
                "Magnit"],
            'img_title' => [
                "Я Райан Гослинг",
                "Фиолетовый Райан Гослинг",
                "Гослинг Бегущий",
                "Гослинг Фанатик",
                "Гослинг Бегущий лежит",
                "Гослинг Драйв за рулём",
                "Гослинг Драйв зубочистка",
                "Гослинг думает",
                "Гослинг молчит",
                "Много Гослингов",
                "День Драйва",
                "Гослинг Бегущий буря",
                "Загадка Гослинга",
                "Гослинг не понимает",
                "Гослинг в Магните"
            ]
        ];
        return $imgs;
    }

}