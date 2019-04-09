var saveSelectColor = {
    'Name': 'SelcetColor',
    'Color': 'theme-white'
}

/*// 判断用户是否已有自己选择的模板风格
if (storageLoad('SelcetColor')) {
    $('body').attr('class', storageLoad('SelcetColor').Color);
	console.log(storageLoad('SelcetColor').Color);
    if(storageLoad('SelcetColor').Color=='theme-black'){
	$('#site_title').attr("style","color: #fff");
         console.log('theme-black');
    } else{
    	$('#site_title').attr("style","color: #000");
        console.log('theme-white');
    }
} else {
    storageSave(saveSelectColor);
    $('body').attr('class', 'theme-black');
   console.log('theme-black');
}
*/

changebackgroudColor();

function changebackgroudColor()
{
// 判断用户是否已有自己选择的模板风格
if (storageLoad('SelcetColor')) {
    $('body').attr('class', storageLoad('SelcetColor').Color);
        console.log(storageLoad('SelcetColor').Color);
    if(storageLoad('SelcetColor').Color=='theme-black'){
        $('#site_title').attr("style","color: #fff");
         console.log('theme-black');
    } else{
        $('#site_title').attr("style","color: #000");
        console.log('theme-white');
    }
} else {
    storageSave(saveSelectColor);
    $('body').attr('class', 'theme-black');
   console.log('theme-black');
}
}
// 本地缓存
function storageSave(objectData) {
    localStorage.setItem(objectData.Name, JSON.stringify(objectData));
	changebackgroudColor();
}

function storageLoad(objectName) {
    if (localStorage.getItem(objectName)) {
        return JSON.parse(localStorage.getItem(objectName))
    } else {
        return false
    }
}