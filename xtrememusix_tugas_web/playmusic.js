var musik = document.getElementById('audios');
var musik1 = document.getElementById('audios1');
var musik2 = document.getElementById('audios2');
var btn = document.getElementById('btnplay');
var count = 0;

function playpause(icons){
    if (count == 0){
        count = 1;
        musik.play();
        if(document.getElementById(icons).className=='bx bx-caret-right-circle'){
            document.getElementById(icons).className = 'bx bx-pause-circle';
        }
    } else{
        count = 0;
        musik.pause();
        if(document.getElementById(icons).className=='bx bx-pause-circle'){
            document.getElementById(icons).className = 'bx bx-caret-right-circle';
        }
    }
}

function playpause1(icons){
    if (count == 0){
        count = 1;
        musik1.play();
        if(document.getElementById(icons).className=='bx bx-caret-right-circle'){
            document.getElementById(icons).className = 'bx bx-pause-circle';
        }
    } else{
        count = 0;
        musik1.pause();
        if(document.getElementById(icons).className=='bx bx-pause-circle'){
            document.getElementById(icons).className = 'bx bx-caret-right-circle';
        }
    }
}

function playpause2(icons){
    if (count == 0){
        count = 1;
        musik2.play();
        if(document.getElementById(icons).className=='bx bx-caret-right-circle'){
            document.getElementById(icons).className = 'bx bx-pause-circle';
        }
    } else{
        count = 0;
        musik2.pause();
        if(document.getElementById(icons).className=='bx bx-pause-circle'){
            document.getElementById(icons).className = 'bx bx-caret-right-circle';
        }
    }
}
