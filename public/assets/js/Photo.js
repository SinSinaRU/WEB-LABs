/*var path = "../../../public/assets/img/";

var photos = new Array();

var names = new Array();
names[0] = "Me_It's_Gosling";
names[1] = "Purple_Gosling ";
names[2] = "Gosling";
names[3] = "Gosling2";
names[4] = "Gosling3";
names[5] = "Gosling4";
names[6] = "Gosling5";
names[7] = "Makes_You_Think";
names[8] = "Sound_of_Silence";
names[9] = "Clones";
names[10] = "Day_Drive";
names[11] = "blade_runner";
names[12] = "Question";
names[13] = "Don't_Understand";
names[14] = "Magnit";

for (i = 0; i < 15; ++i) {
    photos[i] = path + names[i] + ".jpg";


var titles = new Array();
titles[0] = "Я Райан Гослинг";
titles[1] = "Фиолетовый Райан Гослинг";
titles[2] = "Гослинг Бегущий";
titles[3] = "Гослинг Фанатик";
titles[4] = "Гослинг Бегущий лежит";
titles[5] = "Гослинг Драйв за рулём";
titles[6] = "Гослинг Драйв зубочистка";
titles[7] = "Гослинг думает";
titles[8] = "Гослинг молчит";
titles[9] = "Много Гослингов";
titles[10] = "День Драйва";
titles[11] = "Гослинг Бегущий буря";
titles[12] = "Загадка Гослинга";
titles[13] = "Гослинг не понимает";
titles[14] = "Гослинг в Магните";

var ImagesArray = new Array();

for (i = 0; i < photos.length; ++i) {
    document.write('<img id=' + i + ' src="' + photos[i] + '" title="' + titles[i] + '" onClick="' + 'return openMyPhoto(this)" class="image">');
    let image = new Image();
    image.src = photos[i];
    ImagesArray.push(image);
}
*/


function openMyPhoto(image) {
    if (!document.getElementById("PhotoBig")) {
        var div = document.createElement('div');
        div.id = "PhotoBig";
        document.body.appendChild(div);
        var img = document.createElement('img');
        img.id="BigPhotoImg";
        img.title = image.title;
        img.src = image.src;
        img.width = image.width * 2;
        img.height = image.height * 2;
        div.appendChild(img);
        return;
    }
    div=document.getElementById("PhotoBig");
    if(document.getElementById("BigPhotoImg"))
    {
        remove_img=document.getElementById("BigPhotoImg");
        div.removeChild(remove_img);
    }
    var img = document.createElement('img');
    img.id="BigPhotoImg";
    img.title = image.title;
    img.src = image.src;
    div.appendChild(img);
}
