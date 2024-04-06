// let r = prompt("Enter your Name","Name");


var container = document.getElementById('container1');
var container2 = document.getElementById('container2');

function content2(mClass, html) {
    return '<div class="' + mClass + '">' + html + '</div>';
}

for (var i = 0; i < 55 ; i++) {
    container.innerHTML += content2('content2', 
    container2.innerHTML , content2()  , 
    // document.getElementById('part00').innerHTML=("%ch",r)
    );
}








