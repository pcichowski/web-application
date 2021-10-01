function jsDziala(){
  var checkboxes = document.getElementsByClassName('gallery-check');
  for(let i = 0; i < checkboxes.length; i++){
    checkboxes[i].classList.add('pokazprzyciski');
  }
}

jsDziala();

var przeczytaned = 0;

function save(){
    var checkbox = document.getElementsByClassName('chbox');
    var tempstring = '';
    var tempprzeczytane = 0;
    for(let i = 0; i < 10; i++){
      if(checkbox[i].checked){
        tempstring+='1';
        tempprzeczytane++;
      }else{
        tempstring+='0';
      }
    }
    localStorage.setItem('checkboxstate', tempstring);
    przeczytaned = tempprzeczytane;

    var getCreated = document.getElementById('initial').childNodes;
    getCreated[0].innerHTML = 'Przeczytałeś ' + przeczytaned + ' na ' + '10' + ' komiksów z tej listy :)';

    var completed = document.querySelector('.completed');
    if(przeczytaned == 10){
      completed.classList.toggle('showcompleted');
    }else{
      completed.classList.remove('showcompleted');
    }

    $( function() {
      $( "#progressbar" ).progressbar({
        max: 10,
        value: przeczytaned
      });
    } );
}

var output = localStorage.getItem('checkboxstate');

if(output == null){
  output = '0000000000';
}

function load(){
    var checkbox2 = document.getElementsByClassName('chbox');
  
    for(let i = 0; i < 10; i++){
      if(output[i] == '1'){
        checkbox2[i].checked = true;
        przeczytaned++;
      }else if(output[i] == '0'){
        checkbox2[i].checked = false;
      }
    }
    $( function() {
      $( "#progressbar" ).progressbar({
        max: 10,
        value: przeczytaned
      });
    } );
}

load();

function przeczytane(){
  var initial = document.getElementById('initial');
  var created = document.createElement('p');
  created.innerHTML = 'Przeczytałeś ' + przeczytaned + ' na ' + '10' + ' komiksów z tej listy :)';
  
  initial.appendChild(created);

  var completed = document.querySelector('.completed');
  if(przeczytaned == 10){
    completed.classList.toggle('showcompleted');
  }else{
    completed.classList.remove('showcompleted');
  }

}

przeczytane();
