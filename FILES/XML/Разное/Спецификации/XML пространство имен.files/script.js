if(document.images) {
		btnover = new Array(8);
		btnout = new Array(8);
		for(var i=1;i<=8;i++) {
			btnover[i]=new Image();
			btnout[i]=new Image();
			btnover[i].src="/images/btn"+i+"u.gif";
			btnout[i].src="/images/btn"+i+"d.gif";
					}
					                     }

function tabOn(i) {
 if(document.images) document.images["btn"+i].src=btnover[i].src;
}
function tabOff(i) {
 if(document.images) document.images["btn"+i].src=btnout[i].src;
}
var curwidth;

// Перечень id таблиц, встречающихся во всех страницах
tbls = new Array("header1","header2","search","table1","table2","table3","footer1","footer2");

function resizer()  //Растяжка страницы
{

if (document.layers != null) //для нетскейпа проявление доп блока
{

if (window.outerWidth>950) {
	if (document.layers.hiddentd) {
          document.layers.hiddentd.pageX=document.layers.NNPos.pageX-146;
          document.layers.hiddentd.pageY=document.layers.NNPos.pageY;
          document.layers.hiddentd.visibility="visible";
		if (document.layers.hiddentd2){
          document.layers.hiddentd2.pageX=document.layers.NNPos2.pageX-146;
          document.layers.hiddentd2.pageY=document.layers.NNPos2.pageY;
          document.layers.hiddentd2.visibility="visible";
		}

          document.layers.banner.pageX=document.layers.NNPos3.pageX-146;
          document.layers.banner.pageY=document.layers.NNPos3.pageY;
          document.layers.banner.visibility="visible";
	}
	if (document.layers.banner2) { // Общение
          document.layers.banner2.pageX=document.layers.NNPos3.pageX-146;
          document.layers.banner2.pageY=document.layers.NNPos3.pageY;
          document.layers.banner2.visibility="visible";
	}
	if (document.layers.banner3) { // Новости
          document.layers.banner3.pageX=document.layers.NNPos3.pageX-146;
          document.layers.banner3.pageY=document.layers.NNPos3.pageY;
          document.layers.banner3.visibility="visible";
	}
} 
else  //Его исчезание
{
	if (document.layers.hiddentd) {
		document.layers.hiddentd.visibility="hide";
		document.layers.hiddentd2.visibility="hide";
		document.layers.banner.visibility="hide";
	}
	if (document.layers.banner2) { // Общение
		document.layers.banner2.visibility="hide";
	}
	if (document.layers.banner3) { // Новости и Развлечения
		document.layers.banner3.visibility="hide";
	}
}

}

else { //для IE проявление доп блока

if (document.body.clientWidth>=931 && curwidth!=921)
    {
	curwidth=921;
	for (var i=0;i<tbls.length;i++) eval("if (document.all."+tbls[i]+") document.all."+tbls[i]+".width=curwidth;") // Все страницы
	if (document.all.search1) document.all.search1.width=519; // Все страницы
//	if (document.all.newslentatop1) document.all.newslentatop1.width=475; // Новости
//	if (document.all.newslentatop2) document.all.newslentatop2.width=475; // Новости
	if (document.all.newslentabot) document.all.newslentabot.width=570; // Home

	  if (document.all.hiddentd) { // Home
          myNewCell1 = document.all.table1.rows[0].insertCell(4);
          myNewCell2 = document.all.table1.rows[0].insertCell(5);
	  myNewCell1.style.width = 146;
	  myNewCell2.style.width = 5;
          myNewCell1.innerHTML = hiddentd.innerHTML;
          hiddentd.innerHTML = "";
          document.all.table1.rows[0].cells[4].style.verticalAlign="top";
          if (document.all.music1) document.all.music1.height = document.all.table1.rows[0].cells[4].clientHeight-26;
          myNewCell2.innerHTML = document.all.table1.rows[0].cells[3].innerHTML;

          myNewCell3 = document.all.table2.rows[0].insertCell(4);
          myNewCell4 = document.all.table2.rows[0].insertCell(5);
	  myNewCell3.style.width = 146;
	  myNewCell4.style.width = 5;
          myNewCell3.innerHTML = hiddentd2.innerHTML;
          hiddentd2.innerHTML = "";
          document.all.table2.rows[0].cells[4].style.verticalAlign="top";
          if (document.all.music2) document.all.music2.height = document.all.table2.rows[0].cells[4].clientHeight-5;
          myNewCell4.innerHTML = document.all.table1.rows[0].cells[3].innerHTML;

          myNewCell5 = document.all.table2.rows[1].insertCell(3);
          myNewCell6 = document.all.table2.rows[1].insertCell(4);
	  myNewCell5.style.width = 146;
	  myNewCell6.style.width = 5;
          myNewCell5.innerHTML = banner.innerHTML;
          myNewCell6.innerHTML = document.all.table1.rows[0].cells[3].innerHTML;
          document.all.table2.rows[1].cells[3].style.verticalAlign="bottom";
	  }
	  if (document.all.banner2) { // Общение
          myNewCell5 = document.all.table2.rows[0].insertCell(4);
          myNewCell6 = document.all.table2.rows[0].insertCell(5);
	  myNewCell5.style.width = 146;
	  myNewCell6.style.width = 5;
          myNewCell5.innerHTML = banner2.innerHTML;
          myNewCell6.innerHTML = document.all.table2.rows[0].cells[3].innerHTML;
          document.all.table2.rows[0].cells[4].style.verticalAlign="bottom";
	  }
	  if (document.all.banner3) { // Новости(и подуровни), Развлечения, Навигатор
          myNewCell5 = document.all.table1.rows[1].insertCell(3);
          myNewCell6 = document.all.table1.rows[1].insertCell(4);
          if (document.all.table1.rows[0].cells[2].colSpan==3)
          document.all.table1.rows[0].cells[2].colSpan=5; // Навигатор
          else			 
          document.all.table1.rows[0].cells[2].colSpan=3; // Новости и Развлечения
	  myNewCell5.style.width = 146;
	  myNewCell6.style.width = 5;
          myNewCell5.innerHTML = banner3.innerHTML;
          myNewCell6.innerHTML = document.all.table1.rows[1].cells[0].innerHTML;
          document.all.table1.rows[1].cells[3].style.verticalAlign="bottom";
	  }
} else if (document.body.clientWidth<931 && curwidth==921){

			if (document.all.hiddentd) {
            document.all.table1.rows[0].deleteCell(5);
            hiddentd.innerHTML = document.all.table1.rows[0].cells[4].innerHTML;
            document.all.table1.rows[0].deleteCell(4);
            document.all.table2.rows[0].deleteCell(5);
            hiddentd2.innerHTML = document.all.table2.rows[0].cells[4].innerHTML;
            document.all.table2.rows[0].deleteCell(4);
            document.all.table2.rows[1].deleteCell(4);
            document.all.table2.rows[1].deleteCell(3);
			}
			if (document.all.banner2) { // Общение
            document.all.table2.rows[0].deleteCell(5);
            document.all.table2.rows[0].deleteCell(4);
			}
			if (document.all.banner3) { // Новости и Развлечения, Навигатор
            document.all.table1.rows[1].deleteCell(4);
            document.all.table1.rows[1].deleteCell(3);
            document.all.table1.rows[0].cells[2].colSpan-=2;
			}

          curwidth=770;
	for (i=0;i<tbls.length;i++) eval("if (document.all."+tbls[i]+") document.all."+tbls[i]+".width=curwidth;") // Все страницы
	if (document.all.search1) document.all.search1.width=358; // Все страницы
//	if (document.all.newslentatop1) document.all.newslentatop1.width=324; // Новости
//	if (document.all.newslentatop2) document.all.newslentatop2.width=324; // Новости
	if (document.all.newslentabot) document.all.newslentabot.width=439; // Home
    }
  }
}

// скрипты для левой таблицы

function menuover(obj)
{
obj.style.cursor="hand";
obj.className="menubgIE2";
obj.all.tags('A').item(0).style.color="#018977";
}

function menuout(obj)
{
obj.className="menubgIE";
obj.all.tags('A').item(0).style.color="#231F20";
}

function menuclick(obj)
{
window.location.href=obj.all.tags('A').item(0).href;
}

function submenuover(obj)
{
obj.style.cursor="hand";
obj.className="submenubgIE2";
}

function submenuout(obj)
{
obj.className="submenubgIE";
}

// скрипты для правой таблицы

function menuover2(obj)
{
obj.style.cursor="hand";
obj.className="menubgIE";
obj.all.tags('A').item(0).style.color="#018977";
}

function menuout2(obj)
{
obj.className="menubgIE2";
obj.all.tags('A').item(0).style.color="#231F20";
}

function NewsTopNextOver(txt,img) {
if (document.all) document.all[txt].className='newslentacapa';
document[img].src='/images/newsnext_green.gif';
}

function NewsTopNextOut(txt,img) {
if (document.all) document.all[txt].className='newslentacap';
document[img].src='/images/newsnext_on.gif';
}

function NewsNextOver(txt,img) {
if (document.all) document.all[txt].className='newslentacapa';
document[img].src='/images/newsnext_on.gif';
}

function NewsNextOut(txt,img) {
if (document.all) document.all[txt].className='newslentacap';
document[img].src='/images/newsnext_off.gif';
}
